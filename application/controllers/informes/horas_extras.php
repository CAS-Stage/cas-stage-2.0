<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horas_Extras extends CI_Controller {
    
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
        
        $UltimoFactorHoraExtra = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'FACTOR_HORA_EXTRA') {
                $UltimoFactorHoraExtra = $item;
                //break;
            }
        }
        
        $UltimoFactorGratificacion = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'FACTOR_GRATIFICACION') {
                $UltimoFactorGratificacion = $item;
                //break;
            }
        }
        
        $UltimoSueldoMinimo = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'SUELDO_MINIMO') {
                $UltimoSueldoMinimo = $item;
                //break;
            }
        }
        
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
            
            
                        
            $RegistroMensualSeleccionado = null;
            $UltimaRentaContrato = null;
            
            if ($UltimoContrato) {
                
                foreach($UltimoContrato->getTipoContrato()->getRentasContrato() as $subitem) {
                    $UltimaRentaContrato = $subitem;
                    //break;
                }
                
                foreach ($UltimoContrato->getRegistrosMensuales() as $subitem){ 
                    if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == $periodo_actual) {
                        $RegistroMensualSeleccionado = $subitem;
                        break;
                    }
                }
            
                $empleados[] = array(
                    'rut' => $item->getRut(),
                    'apellidos' => $item->getApellidos(),
                    'nombres' => $item->getNombres(),
                    'cantidad_horas_extras' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getCantidadHorasExtras() : 0,
                    'valor_monetario' => ($RegistroMensualSeleccionado AND $UltimoFactorHoraExtra)?
                        $UltimoFactorHoraExtra->getValor() * (
                                (
                                    ($UltimaRentaContrato->getRentaBruta() * .25 > $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12)?
                                    $UltimoSueldoMinimo->getValor() * $UltimoFactorGratificacion->getValor() / 12
                                    : $UltimaRentaContrato->getRentaBruta() * .25
                                ) + $UltimaRentaContrato->getRentaBruta()
                        ) * $RegistroMensualSeleccionado->getCantidadHorasExtras()
                        : 0
                );
            }
        }
        $this->parser->parse('informes/horas_extras/index', array(
            'empleados' => $empleados,
            'mes' => $mes,
            'usuario' => Access::get_current_user()
        ));
    }
    
}
