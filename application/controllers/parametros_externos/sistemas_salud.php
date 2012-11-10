<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistemas_Salud extends CI_Controller {

    public function index() {
        
        $sistemas_salud = array();
        foreach($this->doctrine->em->getRepository('Entities\SistemaSalud')->findAll() as $item) {
            
            $sistemas_salud[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            );
        }
        $this->parser->parse('parametros_externos/sistemas_salud/index', array(
            'sistemas_salud' => $sistemas_salud
        ));
    }
    
    public function modificar($id) {
        $SistemaSaludActual = $this->doctrine->em->getReference('Entities\SistemaSalud', $id);
        
        if (!$this->input->post()) {
        
            $this->parser->parse('parametros_externos/sistemas_salud/modificar', array(
                'sistema_salud' => array(
                    'id' => $SistemaSaludActual->getId(),
                    'nombre' => $SistemaSaludActual->getNombre(),
                    'tiene_pacto' => $SistemaSaludActual->getTienePacto()
                )
            ));
            
        } else {
            
            $this->form_validation->set_rules('nombre', null, 'required|max_length[45]');
            $this->form_validation->set_rules('tiene_pacto', null, 'numeric');
            
            if ($this->form_validation->run()) {
            
                $SistemaSaludActual->setNombre($this->input->post('nombre'));
                $SistemaSaludActual->setTienePacto($this->input->post('tiene_pacto'));

                $this->doctrine->em->persist($SistemaSaludActual);
                $this->doctrine->em->flush();

                $this->parser->parse('parametros_externos/sistemas_salud/guardar', array());
                
            } else {
            
                $this->parser->parse('parametros_externos/sistemas_salud/error_modificar', array(
                    'sistema_salud' => array (
                        'id' => $SistemaSaludActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
}
