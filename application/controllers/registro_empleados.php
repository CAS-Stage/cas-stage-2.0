<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Empleados extends CI_Controller {

    public function index() {
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

            $UltimoPactoSalud = null;
            foreach($UltimoContrato->getPactosSalud() as $subitem) {
                $UltimoPactoSalud = $subitem;
                break;
            }
            
            $empleados[] = array(
                'rut' => $item->getRut(),
                'apellidos' => $item->getApellidos(),
                'nombres' => $item->getNombres(),
                'direccion' => $item->getDireccion(),
                'comuna' => $item->getComuna()->getNombre(),
                'fono' => $item->getFono(),
                'fecha_inicio_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                'fecha_termino_contrato' => ($UltimoContrato->getFechaTermino())? $UltimoContrato->getFechaTermino()->getTimestamp() : null,
                'cargo_tipo_contrato' => $UltimaRentaContrato->getTipoContrato()->getCargo()
            );
        }
        $this->parser->parse('registro_empleados/index', array(
            'empleados' => $empleados
        ));
    }
    
    public function agregar() {
        $EmpleadoNuevo = new Entities\Empleado;
        
        $comunas = array();
        foreach($this->doctrine->em->getRepository('Entities\Comuna')->findAll() as $item) {
            $comunas[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            );
        }
        
        $tipos_contrato = array();
        foreach($this->doctrine->em->getRepository('Entities\TipoContrato')->findAll() as $item) {
            $tipos_contrato[] = array(
                'id' => $item->getId(),
                'cargo' => $item->getCargo()
            );
        }
        
        $prevision = array();
        foreach($this->doctrine->em->getRepository('Entities\Prevision')->findAll() as $item) {
            $prevision[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            );
        }
        
        $sistemas_salud = array();
        foreach($this->doctrine->em->getRepository('Entities\SistemaSalud')->findAll() as $item) {
            $sistemas_salud[] = array(
                'id' => $item->getId(),
                'nombre' => $item->getNombre(),
                'tiene_pacto' => $item->getTienePacto()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('registro_empleados/agregar', array(
                'comunas' => $comunas,
                'tipos_contrato' => $tipos_contrato,
                'prevision' => $prevision,
                'sistemas_salud' => $sistemas_salud
            ));
            
        } else {
            
            $this->form_validation->set_rules('rut', null, 'required|numeric');
            $this->form_validation->set_rules('dv', null, 'required|max_length[1]|matches[modulo11|rut]');
            $this->form_validation->set_rules('apellidos', null, 'required|max_length[45]');
            $this->form_validation->set_rules('nombres', null, 'required|max_length[45]');
            $this->form_validation->set_rules('fecha_nacimiento', null, 'required|valid_date');
            $this->form_validation->set_rules('direccion', null, 'required|max_length[100]');
            $this->form_validation->set_rules('id_comuna', null, 'required|numeric');
            $this->form_validation->set_rules('fono', null, 'max_length[45]');
            
            $this->form_validation->set_rules('fecha_inicio_contrato', null, 'required|valid_date');
            $this->form_validation->set_rules('fecha_termino_contrato', null, 'valid_date');
            $this->form_validation->set_rules('id_cargo', null, 'required|numeric');
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('id_sistema_salud', null, 'required|numeric');
            $this->form_validation->set_rules('pacto_salud', null, 'numeric');
            

            if ($this->form_validation->run()) {
            
                $EmpleadoNuevo->setRut($this->input->post('rut'));
                $EmpleadoNuevo->setApellidos($this->input->post('apellidos'));
                $EmpleadoNuevo->setNombres($this->input->post('nombres'));
                $EmpleadoNuevo->setFechaNacimiento($this->input->post('fecha_nacimiento')->format('Y-m-d'));
                $EmpleadoNuevo->setDireccion($this->input->post('direccion'));
                $EmpleadoNuevo->setComuna(
                    $this->doctrine->em->getReference('Entities\Comuna', $this->input->post('id_comuna'))
                );
                $EmpleadoNuevo->setFono($this->input->post('fono'));
                
                $ContratoNuevo = new Entities\Contrato;
                
                $ContratoNuevo->setFechaInicio(date_create($this->input->post('fecha_inicio_contrato')));
                if ($this->input->post('fecha_termino_contrato'))
                    $ContratoNuevo->setFechaInicio(date_create($this->input->post('fecha_termino_contrato')));
                $ContratoNuevo->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $ContratoNuevo->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );
                $ContratoNuevo->setSistemaSalud(
                    $this->doctrine->em->getReference('Entities\SistemaSalud', $this->input->post('id_sistema_salud'))
                );
                $ContratoNuevo->setPacto($this->input->post('descuento')/100);
                
                $PactoSaludNuevo = new Entities\PactoSalud;
                
                $PactoSaludNuevo->setFechaPeriodo(date_create(strftime('%Y-%m-01')));
                $PactoSaludNuevo->setPacto($this->input->post('pacto_salud'));
                
                $ContratoNuevo->addPactoSaud($PactoSaludNuevo);
                
                $EmpleadoNuevo->addContrato($ContratoNuevo);

                try {
                    $this->doctrine->em->persist($EmpleadoNuevo);
                    $this->doctrine->em->flush();

                    $this->parser->parse('registro_empleados/crear', array());
                } catch(Exception $e) {
                    $this->parser->parse('registro_empleados/error_agregar_unico', array());
                }
                
            } else {
            
                $this->parser->parse('registro_empleados/error_agregar', array());
                
            }
        
        }
    }
    
}
