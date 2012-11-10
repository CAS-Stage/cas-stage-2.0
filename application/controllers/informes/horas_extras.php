<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horas_Extras extends CI_Controller {
    
    public function index($periodo_actual = null) {
        if (is_null($periodo_actual))
            $periodo_actual =  strftime('%Y-%m-01');
        
        $UltimoFactorHoraExtra = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'FACTOR_HORA_EXTRA') {
                $UltimoFactorHoraExtra = $item;
                break;
            }
        }
        
        $UltimoFactorGratificacion = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'FACTOR_GRATIFICACION') {
                $UltimoFactorGratificacion = $item;
                break;
            }
        }
        
        $UltimoSueldoMinimo = null;
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findAll() as $item) {
            if ($item->getCodigo() == 'SUELDO_MINIMO') {
                $UltimoSueldoMinimo = $item;
                break;
            }
        }
        
        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findAll() as $item) {
            
            $UltimoContrato = null;
            foreach($item->getContratos() as $subitem) {
                $UltimoContrato = $subitem;
                break;
            }
            
            $UltimaRentaContrato = null;
            foreach($UltimoContrato->getTipoContrato()->getRentasContrato() as $subitem) {
                $UltimaRentaContrato = $subitem;
                break;
            }
                        
            $RegistroMensualSeleccionado = null;
            foreach ($UltimoContrato->getRegistrosMensuales() as $subitem){ 
                if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == $periodo_actual)
                    $RegistroMensualSeleccionado = $subitem;
                break;
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
        $this->parser->parse('informes/horas_extras/index', array(
            'empleados' => $empleados
        ));
    }
    
}
