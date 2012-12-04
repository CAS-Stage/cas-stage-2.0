<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquidaciones_Sueldo extends CI_Controller {

    public function index($periodo_actual = null) {
        if (is_null($periodo_actual) AND $this->input->post('mes') == '') {
            $periodo_actual =  strftime('%Y-%m');
            $mes = strftime('%Y-%m');
        }
        else {
            if (!is_null($periodo_actual))
                $mes = $periodo_actual;
            if ($this->input->post('mes') != '') {
                $periodo_actual = $this->input->post('mes');
                $mes = $this->input->post('mes');
            }
        }
        
        $periodo_actual = strftime($periodo_actual.'-01');

        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findBy(array(), array('apellidos' => 'ASC', 'nombres' => 'ASC', 'rut' => 'ASC')) as $item) {
            
            $UltimoContrato = null;
            foreach($item->getContratos() as $subitem) {                
                if (
                        (
                            $subitem->getFechaTermino() == null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-01')) <= strtotime($periodo_actual)
                        ) OR (
                            $subitem->getFechaTermino() != null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-01')) <= strtotime($periodo_actual) AND
                            strtotime($subitem->getFechaTermino()->format('Y-m-01')) >= strtotime($periodo_actual)
                        )
                    ) {
                        $UltimoContrato = $subitem;
                        break;
                    }
            }
            
            if ($UltimoContrato) {
                $RegistroMensualSeleccionado = null;
                foreach ($UltimoContrato->getRegistrosMensuales() as $subitem){ 
                    if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == $periodo_actual) {
                        $RegistroMensualSeleccionado = $subitem;
                        break;
                    }
                }

                if ($UltimoContrato->getFechaTermino() == null OR ($UltimoContrato->getFechaTermino() != null AND strtotime($UltimoContrato->getFechaTermino()->format('Y-m-01')) >= strtotime($periodo_actual)))
                    $empleados[] = array(
                        'rut' => $item->getRut(),
                        'apellidos' => $item->getApellidos(),
                        'nombres' => $item->getNombres(),
                        'fecha_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                        'cargo' => $UltimoContrato->getTipoContrato()->getCargo()
                    );
            }
        }
        $this->parser->parse('informes/liquidaciones_sueldo/index', array(
            'empleados' => $empleados,
            'mes' => $mes,
            'usuario' => Access::get_current_user()
        ));
    }
    
    public function ver($rut, $periodo_actual = null) {
        if (is_null($periodo_actual) AND $this->input->post('mes') == '') {
            $periodo_actual =  strftime('%Y-%m');
            $mes = strftime('%Y-%m');
        }
        else {
            if (!is_null($periodo_actual))
                $mes = $periodo_actual;
            if ($this->input->post('mes') != '') {
                $periodo_actual = $this->input->post('mes');
                $mes = $this->input->post('mes');
            }
        }
        
        $periodo_actual = strftime($periodo_actual.'-01');
        
        $UltimoFactorHoraExtra = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'FACTOR_HORA_EXTRA'), array('fecha_vigencia' => 'DESC')) as $item) {
            if (strftime('%Y-%m-01', $item->getFechaVigencia()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoFactorHoraExtra = $item;
                break;
            }
        }
        
        $UltimoFactorGratificacion = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'FACTOR_GRATIFICACION'), array('fecha_vigencia' => 'DESC')) as $item) {
            if (strftime('%Y-%m-01', $item->getFechaVigencia()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoFactorGratificacion = $item;
                break;
            }
        }
        
        $UltimoSueldoMinimo = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'SUELDO_MINIMO'), array('fecha_vigencia' => 'DESC')) as $item) {
            if (strftime('%Y-%m-01', $item->getFechaVigencia()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoSueldoMinimo = $item;
                break;
            }
        }
        
        $UltimoValorUf = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'VALOR_UF'), array('fecha_vigencia' => 'DESC')) as $item) {
            if (strftime('%Y-%m-01', $item->getFechaVigencia()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoValorUf = $item;
                break;
            }
        }
        
        $UltimoDescuentoSalud = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'DESCUENTO_SALUD'), array('fecha_vigencia' => 'DESC')) as $item) {
            if (strftime('%Y-%m-01', $item->getFechaVigencia()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoDescuentoSalud = $item;
                break;
            }
        }
        
        $item = $this->doctrine->em->getRepository('Entities\Empleado')->findOneByRut($rut);
               
        $UltimoContrato = null;
        foreach($item->getContratos() as $subitem) {                
                if (
                        (
                            $subitem->getFechaTermino() == null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-01')) <= strtotime($periodo_actual)
                        ) OR (
                            $subitem->getFechaTermino() != null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-01')) <= strtotime($periodo_actual) AND
                            strtotime($subitem->getFechaTermino()->format('Y-m-01')) >= strtotime($periodo_actual)
                        )
                    ) {
                        $UltimoContrato = $subitem;
                        break;
                    }
            }
        
        $UltimaRentaContrato = null;
        foreach($UltimoContrato->getTipoContrato()->getRentasContrato() as $subitem) {
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimaRentaContrato = $subitem;
                break;
            }
        }
        
        $UltimoDescuentoPrevision = null;        
        foreach($UltimoContrato->getPrevision()->getDescuentosPrevision() as $subitem) {
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoDescuentoPrevision = $subitem;
                break;
            }
        }
        
        $UltimoPactoSalud = null;
        foreach($UltimoContrato->getPactosSalud() as $subitem) {
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoPactoSalud = $subitem;
                break;
            }
        }
        
        $RegistroMensualSeleccionado = null;
        foreach ($UltimoContrato->getRegistrosMensuales() as $subitem){ 
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == strftime($periodo_actual)) {
                $RegistroMensualSeleccionado = $subitem;
                break;
            }
        }
        
        $empleado = array(
            'rut' => $item->getRut(),
            'apellidos' => $item->getApellidos(),
            'nombres' => $item->getNombres(),
            'periodo' => strtotime($periodo_actual),
            'haberes' => array(
                'imponible' => array(
                    'sueldo_base' => $UltimaRentaContrato->getRentaBruta(),
                    'gratificacion' => ($UltimaRentaContrato->getGratificacion())?
                        ($UltimaRentaContrato->getRentaBruta() * .25 > $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12)?
                        $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12
                        : $UltimaRentaContrato->getRentaBruta() * .25
                    : null,
                    'horas_extras' => ($RegistroMensualSeleccionado AND $UltimoFactorHoraExtra)? (($RegistroMensualSeleccionado->getCantidadHorasExtras())? array(
                        'cantidad' => $RegistroMensualSeleccionado->getCantidadHorasExtras(),
                        'valor_monetario' => $UltimoFactorHoraExtra->getValor() *
                                (
                                        (
                                            ($UltimaRentaContrato->getRentaBruta() * .25 > $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12)?
                                            $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12
                                            : $UltimaRentaContrato->getRentaBruta() * .25
                                        ) + $UltimaRentaContrato->getRentaBruta()
                                ) * $RegistroMensualSeleccionado->getCantidadHorasExtras()
                         ) : null) : null,
                    'horas_extras_f' => ($RegistroMensualSeleccionado AND $UltimoFactorHoraExtra)? (($RegistroMensualSeleccionado->getCantidadHorasExtrasF())? array(
                        'cantidad' => $RegistroMensualSeleccionado->getCantidadHorasExtrasF(),
                        'valor_monetario' => $UltimoFactorHoraExtra->getValor() *
                                (
                                        (
                                            ($UltimaRentaContrato->getRentaBruta() * .25 > $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12)?
                                            $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12
                                            : $UltimaRentaContrato->getRentaBruta() * .25
                                        ) + $UltimaRentaContrato->getRentaBruta()
                                        + 680
                                ) * $RegistroMensualSeleccionado->getCantidadHorasExtrasF()
                         ) : null) : null,
                    'bono_produccion' => ($RegistroMensualSeleccionado)? (($RegistroMensualSeleccionado->getBonoProduccion())? $RegistroMensualSeleccionado->getBonoProduccion() : null) : null
                ),
                'no_imponible' => array(
                    'bono_movilizacion' => ($RegistroMensualSeleccionado)? (($RegistroMensualSeleccionado->getBonoMovilizacion())? $RegistroMensualSeleccionado->getBonoMovilizacion() : null) : null,
                    'bono_colacion' => ($RegistroMensualSeleccionado)? (($RegistroMensualSeleccionado->getBonoColacion())? $RegistroMensualSeleccionado->getBonoColacion() : null) : null
                )
            ),
            'descuentos' => array(
                'legales' => array(
                    'prevision' => array(
                        'nombre' => $UltimoContrato->getPrevision()->getNombre(),
                        'descuento' => $UltimoDescuentoPrevision->getDescuento()
                    ),
                    'sistema_salud' => array(
                        'nombre' => $UltimoPactoSalud->getSistemaSalud()->getNombre(),
                        'descuento' => $UltimoDescuentoSalud->getValor(),
                        'pacto' => ($UltimoPactoSalud->getPacto())?
                            $UltimoValorUf->getValor() * $UltimoPactoSalud->getPacto()
                            : null
                    )
                    
                ),
                'otros' => array(
                    'anticipo' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getMontoAnticipo() : null,
                )
            ),
            

        );
        
        $this->parser->parse('informes/liquidaciones_sueldo/ver', array(
           'empleado' => $empleado,
           'usuario' => Access::get_current_user()
        ));
    }
    
}
