<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sueldo_Minimo extends CI_Controller {

    public function index() {
        
        $parametros_externos = array();
        foreach($this->doctrine->em->getRepository('Entities\ParametroExterno')->findBy(array('codigo' => 'SUELDO_MINIMO'), array('fecha_vigencia' => 'DESC')) as $item) {
            $parametros_externos[] = array(
                'id' => $item->getId(),
                'fecha_vigencia' => $item->getFechaVigencia()->getTimestamp(),
                'valor' => $item->getValor()
            );
        }
        $this->parser->parse('parametros_externos/sueldo_minimo/index', array(
            'parametros_externos' => $parametros_externos
        ));
    }
    
    public function actualizar() {
        $ParametroExternoNuevo = new Entities\ParametroExterno;
        
        if (!$this->input->post()) {
        
            $this->parser->parse('parametros_externos/sueldo_minimo/actualizar', array());
            
        } else {
            
            $this->form_validation->set_rules('fecha_vigencia', null, 'valid_date');
            $this->form_validation->set_rules('valor', null, 'numeric');
            
            if ($this->form_validation->run()) {
            
                $ParametroExternoNuevo->setCodigo('SUELDO_MINIMO');
                $ParametroExternoNuevo->setFechaVigencia(date_create($this->input->post('fecha_vigencia')));
                $ParametroExternoNuevo->setValor($this->input->post('valor'));

                try {
                    $this->doctrine->em->persist($ParametroExternoNuevo);
                    $this->doctrine->em->flush();

                    $this->parser->parse('parametros_externos/sueldo_minimo/crear', array());
                } catch(Exception $e) {
                    $this->parser->parse('parametros_externos/sueldo_minimo/error_actualizar_unico', array());
                }
                
            } else {
            
                $this->parser->parse('parametros_externos/sueldo_minimo/error_actualizar', array());
                
            }
        
        }
    }
    
    public function modificar($id) {
        $ParametroExternoActual = $this->doctrine->em->getReference('Entities\ParametroExterno', $id);
        
        if (!$this->input->post()) {
        
            $this->parser->parse('parametros_externos/sueldo_minimo/modificar', array(
                'parametro_externo' => array(
                    'id' => $ParametroExternoActual->getId(),
                    'fecha_vigencia' => $ParametroExternoActual->getFechaVigencia()->format('Y-m'),
                    'valor' => $ParametroExternoActual->getValor()
                )
            ));
            
        } else {
            
            $this->form_validation->set_rules('fecha_vigencia', null, 'valid_date');
            $this->form_validation->set_rules('valor', null, 'numeric');
            
            if ($this->form_validation->run()) {
            
                $ParametroExternoActual->setFechaVigencia(date_create($this->input->post('fecha_vigencia')));
                $ParametroExternoActual->setValor($this->input->post('valor'));

                try {
                    $this->doctrine->em->persist($ParametroExternoActual);
                    $this->doctrine->em->flush();

                    $this->parser->parse('parametros_externos/sueldo_minimo/guardar', array());
                } catch(Exception $e) {
                    $this->parser->parse('parametros_externos/sueldo_minimo/error_modificar_unico', array(
                        'parametro_externo' => array (
                            'id' => $ParametroExternoActual->getId()
                        )
                    ));
                }
                
            } else {
            
                $this->parser->parse('parametros_externos/sueldo_minimo/error_modificar', array(
                    'parametro_externo' => array (
                        'id' => $ParametroExternoActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
    public function borrar($id) {
        $ParametroExternoActual = $this->doctrine->em->getReference('Entities\ParametroExterno', $id);
        
        $this->doctrine->em->remove($ParametroExternoActual);
        $this->doctrine->em->flush();
        
        redirect('parametros_externos/sueldo_minimo');
    }
    
}
