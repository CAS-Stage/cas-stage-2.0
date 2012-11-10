<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nomina_anticipos extends CI_Controller {
    
    public function index($periodo_actual = null) {
        if (is_null($periodo_actual))
            $periodo_actual =  strftime('%Y-%m-01');
        
        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findAll() as $item) {
            
            $UltimoContrato = null;
            foreach($item->getContratos() as $subitem) {
                $UltimoContrato = $subitem;
                break;
            }
                        
            $RegistroMensualSeleccionado = null;
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
                'monto_anticipo' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getMontoAnticipo() : 0,
                
                            
            );
        }
        $this->parser->parse('informes/nomina_anticipos/index', array(
            'empleados' => $empleados
        ));
    }
    
}