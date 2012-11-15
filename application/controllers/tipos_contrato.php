<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_Contrato extends CI_Controller {

    public function index() {
        $renta_contrato = array();
        foreach($this->doctrine->em->getRepository('Entities\RentaContrato')->findAll() as $item) {
            
            $renta_contrato[] = array(
                'id' => $item->getId(),
                'fecha_periodo' => $item->getFechaPeriodo()->getTimestamp(),
                'renta_bruta' => $item->getRentaBruta(),
                'gratificacion' => $item->getGratificacion(),
                'cargo_tipo_contrato' => $item->getTipoContrato()->getCargo()
            );
        }
        $this->parser->parse('tipos_contrato/index', array(
            'renta_contrato' => $renta_contrato
        ));
    }
    
    public function actualizar() {
        $RentaContratoNuevo = new Entities\RentaContrato;
        
        $tipo_contrato = array();
        foreach($this->doctrine->em->getRepository('Entities\TipoContrato')->findAll() as $item) {
            $tipo_contrato[] = array(
                'id' => $item->getId(),
                'cargo' => $item->getCargo()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('tipos_contrato/actualizar', array(
                'tipo_contrato' => $tipo_contrato
            ));
            
        } else {
            
            $this->form_validation->set_rules('id_tipo_contrato', null, 'required|numeric');
            $this->form_validation->set_rules('fecha_periodo', null, 'required|valid_date');
            $this->form_validation->set_rules('renta_bruta', null, 'required|numeric');
            
            // Volcado de post, ver si pasa sin excepción
//            header('Content-Type: text/plain; charset=utf-8');
//            print_r($_POST);
            //exit;
            
            if ($this->form_validation->run()) {
            
                $RentaContratoNuevo->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $RentaContratoNuevo->setFechaPeriodo(date_create($this->input->post('fecha_periodo')));
                $RentaContratoNuevo->setRentaBruta($this->input->post('renta_bruta'));

                try {
                    $this->doctrine->em->persist($RentaContratoNuevo);
                    $this->doctrine->em->flush();

                    $this->parser->parse('tipos_contrato/crear', array());
                } catch(Exception $e) {
                    // Verificar excepción en base de datos (default para gratificacion)
//                    throw $e;
//                    exit;
                    $this->parser->parse('tipos_contrato/error_actualizar_unico', array());
                }
                
            } else {
            
                $this->parser->parse('tipos_contrato/error_actualizar', array());
                
            }
        
        }
    }
    
    public function modificar($id) {
        $RentaContratoActual = $this->doctrine->em->getReference('Entities\RentaContrato', $id);
        
        $tipo_contrato = array();
        foreach($this->doctrine->em->getRepository('Entities\TipoContrato')->findAll() as $item) {
            $tipo_contrato[] = array(
                'id' => $item->getId(),
                'cargo' => $item->getCargo()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('tipos_contrato/modificar', array(
                'renta_contrato' => array(
                    'id' => $RentaContratoActual->getId(),
                    'id_tipo_contrato' => $RentaContratoActual->getTipoContrato()->getId(),
                    'cargo_tipo_contrato' => $RentaContratoActual->getTipoContrato()->getCargo(),
                    'fecha_periodo' => $RentaContratoActual->getFechaPeriodo()->getTimestamp(),
                    'renta_bruta' => $RentaContratoActual->getRentaBruta(),
                    'gratificacion' => $RentaContratoActual->getGratificacion()
                ),
                'tipo_contrato' => $tipo_contrato
            ));
            
        } else {
            
            $this->form_validation->set_rules('id_tipo_contrato', null, 'required|numeric');
            $this->form_validation->set_rules('fecha_periodo', null, 'required|valid_date');
            $this->form_validation->set_rules('renta_bruta', null, 'required|numeric');
            
            // Volcado de post, ver si pasa sin excepción
//            header('Content-Type: text/plain; charset=utf-8');
//            print_r($_POST);
            //exit;
            
            if ($this->form_validation->run()) {
            
                $RentaContratoActual->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $RentaContratoActual->setFechaPeriodo(date_create($this->input->post('fecha_periodo')));
                $RentaContratoActual->setRentaBruta($this->input->post('renta_bruta'));
                
                try {
                    $this->doctrine->em->persist($RentaContratoActual);
                    $this->doctrine->em->flush();
                    
                    $this->parser->parse('tipos_contrato/guardar', array());
                } catch(Exception $e) {
                    // Verificar excepción en base de datos (default para gratificacion)
                    //throw $e;
                    //exit;
                    $this->parser->parse('tipos_contrato/error_modificar_unico', array(
                        'renta_contrato' => array (
                            'id' => $RentaContratoActual->getId()
                        )
                    ));
                }
                
            } else {
            
                $this->parser->parse('tipos_contrato/error_modificar', array(
                    'renta_contrato' => array (
                        'id' => $RentaContratoActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
    public function borrar($id) {
        $RentaContratoActual = $this->doctrine->em->getReference('Entities\RentaContrato', $id);
        
        $this->doctrine->em->remove($RentaContratoActual);
        $this->doctrine->em->flush();
        
        redirect('tipos_contrato');
    }
    
}
