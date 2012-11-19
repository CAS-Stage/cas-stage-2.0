<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_Empleado extends CI_Controller {

    public function index() {
        $periodo_actual =  strftime('%Y-%m-01');
        
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
            
            if ($UltimoContrato->getFechaTermino() == null OR ($UltimoContrato->getFechaTermino() != null AND $UltimoContrato->getFechaTermino() >= date_create('now')))
                $empleados[] = array(
                    'rut' => $item->getRut(),
                    'apellidos' => $item->getApellidos(),
                    'nombres' => $item->getNombres(),
                    'fecha_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                    'cargo' => $UltimoContrato->getTipoContrato()->getCargo()
                );
        }
        $this->parser->parse('informes/ficha_empleado/index', array(
            'empleados' => $empleados
        ));
    }
    
    public function ver($rut) {
        $item = $this->doctrine->em->getRepository('Entities\Empleado')->findOneByRut($rut);
        
        $UltimoContrato = null;
        foreach($item->getContratos() as $subitem) {
            $UltimoContrato = $subitem;
            //break;
        }
        
        $UltimaRentaContrato = null;
        foreach($UltimoContrato->getTipoContrato()->getRentasContrato() as $subitem) {
            $UltimaRentaContrato = $subitem;
            //break;
        }
        
        $UltimoPactoSalud = null;
        foreach($UltimoContrato->getPactosSalud() as $subitem) {
            $UltimoPactoSalud = $subitem;
            //break;
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
