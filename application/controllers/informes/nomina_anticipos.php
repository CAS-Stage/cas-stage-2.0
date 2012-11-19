<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nomina_anticipos extends CI_Controller {
    
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
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findAll() as $item) {
            
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
            if ($UltimoContrato) {
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
                    'monto_anticipo' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getMontoAnticipo() : 0               
                );
            }
        }
        $this->parser->parse('informes/nomina_anticipos/index', array(
            'empleados' => $empleados,
            'mes' => $mes
        ));
    }
    
}