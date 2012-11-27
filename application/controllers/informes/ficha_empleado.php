<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_Empleado extends CI_Controller {

    public function index() {
        $periodo_actual =  strftime('%Y-%m-01');
        $dia_actual =  strftime('%Y-%m-%d');
        
        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findBy(array(), array('apellidos' => 'ASC', 'nombres' => 'ASC', 'rut' => 'ASC')) as $item) {
            
            $UltimoContrato = null;
            foreach($item->getContratos() as $subitem) {
                if (
                        (
                            $subitem->getFechaTermino() == null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-d')) <= strtotime($dia_actual)
                        ) OR (
                            $subitem->getFechaTermino() != null AND
                            strtotime($subitem->getFechaInicio()->format('Y-m-d')) <= strtotime($dia_actual) AND
                            strtotime($subitem->getFechaTermino()->format('Y-m-d')) >= strtotime($dia_actual)
                        )
                    ) {
                        $UltimoContrato = $subitem;
                        break;
                    }
            }
            
            if ($UltimoContrato) {
            
                if ($UltimoContrato->getFechaTermino() == null OR ($UltimoContrato->getFechaTermino() != null AND $UltimoContrato->getFechaTermino() >= date_create('now')))
                    $empleados[] = array(
                        'rut' => $item->getRut(),
                        'apellidos' => $item->getApellidos(),
                        'nombres' => $item->getNombres(),
                        'fecha_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                        'cargo' => $UltimoContrato->getTipoContrato()->getCargo()
                    );
            }
        }
        
        $this->parser->parse('informes/ficha_empleado/index', array(
            'empleados' => $empleados
        ));
    }
    
    public function ver($rut) {
        $periodo_actual =  strftime('%Y-%m-01');
        $dia_actual =  strftime('%Y-%m-%d');
        
        $item = $this->doctrine->em->getRepository('Entities\Empleado')->findOneByRut($rut);
        
        $UltimoContrato = null;
        foreach($item->getContratos() as $subitem) {
            if (
                    (
                        $subitem->getFechaTermino() == null AND
                        strtotime($subitem->getFechaInicio()->format('Y-m-d')) <= strtotime($dia_actual)
                    ) OR (
                        $subitem->getFechaTermino() != null AND
                        strtotime($subitem->getFechaInicio()->format('Y-m-d')) <= strtotime($dia_actual) AND
                        strtotime($subitem->getFechaTermino()->format('Y-m-d')) >= strtotime($dia_actual)
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
        
        $UltimoPactoSalud = null;
        foreach($UltimoContrato->getPactosSalud() as $subitem) {
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) <= strftime($periodo_actual)) {
                $UltimoPactoSalud = $subitem;
                break;
            }
        }
        
        $empleado = array(
            'rut' => $item->getRut(),
            'apellidos' => $item->getApellidos(),
            'nombres' => $item->getNombres(),
            'fecha_nacimiento' => $item->getFechaNacimiento()->getTimestamp(),
            'direccion' => $item->getDireccion(),
            'comuna' => $item->getComuna()->getNombre(),
            'fono' => $item->getFono(),
            'periodo_contrato' => array(
                'inicio' => $UltimoContrato->getFechaInicio()->getTimeStamp(),
                'fin' => ($UltimoContrato->getFechaTermino())? $UltimoContrato->getFechaTermino()->getTimestamp() : null
            ),
            'renta_bruta' => $UltimaRentaContrato->getRentaBruta(),
            'prevision' => $UltimoContrato->getPrevision()->getNombre(),
            'sistema_salud' => array(
                'nombre' => $UltimoPactoSalud->getSistemaSalud()->getNombre(),
                'pacto' => $UltimoPactoSalud->getPacto()
            )
        );
        
        $this->parser->parse('informes/ficha_empleado/ver', array(
           'empleado' => $empleado
        ));
    }
    
}
