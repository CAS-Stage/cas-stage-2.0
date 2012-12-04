<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prevision extends CI_Controller {

    public function index() {
        
        $descuentos_prevision = array();
        foreach($this->doctrine->em->getRepository('Entities\DescuentoPrevision')->findBy(array(), array('fecha_periodo' => 'DESC')) as $item) {

            $descuentos_prevision[] = array(
                'id' => $item->getId(),
                'nombre_prevision' => $item->getPrevision()->getNombre(),
                'fecha_periodo' => $item->getFechaPeriodo()->getTimestamp(),
                'descuento' => $item->getDescuento()
            );
        }
        $this->parser->parse('parametros_externos/prevision/index', array(
            'descuentos_prevision' => $descuentos_prevision,
            'usuario' => Access::get_current_user()
        ));
    }
    
    public function actualizar() {
        $DescuentoPrevisionNuevo = new Entities\DescuentoPrevision;
        
        $prevision = array();
        foreach($this->doctrine->em->getRepository('Entities\Prevision')->findAll() as $item) {
            $prevision[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('parametros_externos/prevision/actualizar', array(
                'prevision' => $prevision
            ));
            
        } else {
            
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('fecha_periodo', null, 'required|valid_date');
            $this->form_validation->set_rules('descuento', null, 'numeric');
            
            if ($this->form_validation->run()) {
            
                $DescuentoPrevisionNuevo->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );
                $DescuentoPrevisionNuevo->setFechaPeriodo(date_create($this->input->post('fecha_periodo')));
                $DescuentoPrevisionNuevo->setDescuento($this->input->post('descuento')/100);

                try {
                    $this->doctrine->em->persist($DescuentoPrevisionNuevo);
                    $this->doctrine->em->flush();

                    $this->parser->parse('parametros_externos/prevision/crear', array('usuario' => Access::get_current_user()));
                } catch(Exception $e) {
                    $this->parser->parse('parametros_externos/prevision/error_actualizar_unico', array('usuario' => Access::get_current_user()));
                }
                
            } else {
            
                $this->parser->parse('parametros_externos/prevision/error_actualizar', array('usuario' => Access::get_current_user()));
                
            }
        
        }
    }
    
    public function modificar($id) {
        $DescuentoPrevisionActual = $this->doctrine->em->getReference('Entities\DescuentoPrevision', $id);
        
        $prevision = array();
        foreach($this->doctrine->em->getRepository('Entities\Prevision')->findAll() as $item) {
            $prevision[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('parametros_externos/prevision/modificar', array(
                'descuento_prevision' => array(
                    'id' => $DescuentoPrevisionActual->getId(),
                    'id_prevision' => $DescuentoPrevisionActual->getPrevision()->getId(),
                    'nombre_prevision' => $DescuentoPrevisionActual->getPrevision()->getNombre(),
                    'fecha_periodo' => $DescuentoPrevisionActual->getFechaPeriodo()->getTimestamp(),
                    'descuento' => $DescuentoPrevisionActual->getDescuento()
                ),
                'prevision' => $prevision,
                'usuario' => Access::get_current_user()
            ));
            
        } else {
            
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('fecha_periodo', null, 'required|valid_date');
            $this->form_validation->set_rules('descuento', null, 'numeric');
            
            if ($this->form_validation->run()) {
            
                $DescuentoPrevisionActual->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );
                $DescuentoPrevisionActual->setFechaPeriodo(date_create($this->input->post('fecha_periodo')));
                $DescuentoPrevisionActual->setDescuento($this->input->post('descuento')/100);
                
                try {
                    $this->doctrine->em->persist($DescuentoPrevisionActual);
                    $this->doctrine->em->flush();
                    
                    $this->parser->parse('parametros_externos/prevision/guardar', array('usuario' => Access::get_current_user()));
                } catch(Exception $e) {
                    $this->parser->parse('parametros_externos/prevision/error_modificar_unico', array(
                        'descuento_prevision' => array (
                            'id' => $DescuentoPrevisionActual->getId()
                        ),
                        'usuario' => Access::get_current_user()
                    ));
                }
                
            } else {
            
                $this->parser->parse('parametros_externos/prevision/error', array(
                    'prevision' => array (
                        'id' => $DescuentoPrevisionActual->getId()
                    ),
                    'usuario' => Access::get_current_user()
                ));
                
            }
        
        }
    }
    
    public function borrar($id) {
        $DescuentoPrevisionActual = $this->doctrine->em->getReference('Entities\DescuentoPrevision', $id);
        
        $this->doctrine->em->remove($DescuentoPrevisionActual);
        $this->doctrine->em->flush();
        
        redirect('parametros_externos/prevision');
    }
    
}
