<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listado_Empleados extends CI_Controller {

    public function index() {
        $periodo_actual =  strftime('%Y-%m-01');
        
        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findAll() as $item) {
            
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
            
            if ($UltimoContrato->getFechaTermino() == null OR ($UltimoContrato->getFechaTermino() != null AND $UltimoContrato->getFechaTermino() >= date_create('now')))
                $empleados[] = array(
                    'rut' => $item->getRut(),
                    'apellidos' => $item->getApellidos(),
                    'nombres' => $item->getNombres(),
                    'direccion' => $item->getDireccion(),
                    'comuna' => $item->getComuna()->getNombre(),
                    'fono' => $item->getFono(),
                    'inicio_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                    'fin_contrato' => ($UltimoContrato->getFechaTermino())? $UltimoContrato->getFechaTermino()->getTimestamp() : null,
                    'renta_bruta' => $UltimaRentaContrato->getRentaBruta(),
                    'prevision' => $UltimoContrato->getPrevision()->getNombre(),
                    'sistema_salud' => array(
                        'nombre' => $UltimoPactoSalud->getSistemaSalud()->getNombre(),
                        'pacto' => $UltimoPactoSalud->getPacto()
                    )
                );
        }
        $this->parser->parse('informes/listado_empleados/index', array(
            'empleados' => $empleados
        ));
    }
    
}
