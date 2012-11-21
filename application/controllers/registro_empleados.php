<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Empleados extends CI_Controller {

    public function index() {
        $periodo_actual =  strftime('%Y-%m-01');
        $dia_actual =  strftime('%Y-%m-%d');
        
        $empleados = array();
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findAll() as $item) {
            
            $UltimoContrato = null;
            foreach($item->getContratos() as $subitem) {
                if (strftime('%Y-%m-%d', $subitem->getFechaInicio()->getTimestamp()) <= strftime($dia_actual)) {
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
            
            $empleados[] = array(
                'rut' => $item->getRut(),
                'apellidos' => $item->getApellidos(),
                'nombres' => $item->getNombres(),
                'direccion' => $item->getDireccion(),
                'comuna' => $item->getComuna()->getNombre(),
                'fono' => $item->getFono(),
                'fecha_inicio_contrato' => $UltimoContrato->getFechaInicio()->getTimestamp(),
                'fecha_termino_contrato' => ($UltimoContrato->getFechaTermino())? $UltimoContrato->getFechaTermino()->getTimestamp() : null,
                'cargo_tipo_contrato' => $UltimaRentaContrato->getTipoContrato()->getCargo(),
                'id_contrato' => $UltimoContrato->getId(),
                'tiene_pacto_sistema_salud' => $UltimoPactoSalud->getSistemaSalud()->getTienePacto()
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
            $this->form_validation->set_rules('id_tipo_contrato', null, 'required|numeric');
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('id_sistema_salud', null, 'required|numeric');
            $this->form_validation->set_rules('pacto_salud', null, 'numeric');
            

            if ($this->form_validation->run()) {
            
                // Revisar lo que se envía por POST
//                header('Content-Type: text/plain; charset=utf-8');
//                print_r($_POST);
//                exit;
                
                $EmpleadoNuevo->setRut($this->input->post('rut'));
                $EmpleadoNuevo->setApellidos($this->input->post('apellidos'));
                $EmpleadoNuevo->setNombres($this->input->post('nombres'));
                $EmpleadoNuevo->setFechaNacimiento(date_create($this->input->post('fecha_nacimiento')));
                $EmpleadoNuevo->setDireccion($this->input->post('direccion'));
                $EmpleadoNuevo->setComuna(
                    $this->doctrine->em->getReference('Entities\Comuna', $this->input->post('id_comuna'))
                );
                $EmpleadoNuevo->setFono($this->input->post('fono'));
                
                $ContratoNuevo = new Entities\Contrato;
                
                $ContratoNuevo->setFechaInicio(date_create($this->input->post('fecha_inicio_contrato')));
                if ($this->input->post('fecha_termino_contrato'))
                    $ContratoNuevo->setFechaTermino(date_create($this->input->post('fecha_termino_contrato')));
                else
                    $ContratoNuevo->setFechaTermino(null);
                
                $ContratoNuevo->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $ContratoNuevo->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );

                $PactoSaludNuevo = new Entities\PactoSalud;
                
                $PactoSaludNuevo->setFechaPeriodo(date_create(strftime('%Y-%m-01')));
                $PactoSaludNuevo->setPacto($this->input->post('pacto_salud'));
                $PactoSaludNuevo->setSistemaSalud(
                    $this->doctrine->em->getReference('Entities\SistemaSalud', $this->input->post('id_sistema_salud'))
                );
            
                if ($this->input->post('pacto'))
                    $PactoSaludNuevo->setPacto($this->input->post('pacto'));
                else
                    $PactoSaludNuevo->setPacto(null);
                
                //$ContratoNuevo->addPactoSalud($PactoSaludNuevo);
                $PactoSaludNuevo->setContrato($ContratoNuevo);
                
                //$EmpleadoNuevo->addContrato($ContratoNuevo);
                $ContratoNuevo->setEmpleado($EmpleadoNuevo);

                try {
                    //$this->doctrine->em->persist($EmpleadoNuevo);
                    $this->doctrine->em->persist($EmpleadoNuevo);
                    $this->doctrine->em->persist($ContratoNuevo);
                    $this->doctrine->em->persist($PactoSaludNuevo);
                    $this->doctrine->em->flush();

                    $this->parser->parse('registro_empleados/crear', array());
                } catch(Exception $e) {
//                    throw $e;
//                    exit;
                    $this->parser->parse('registro_empleados/error_agregar_unico', array());
                }
                
            } else {
            
                $this->parser->parse('registro_empleados/error_agregar', array());
                
            }
        
        }
    }
    
    public function modificar($id) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        
        $UltimoPactoSalud = null;
        foreach($ContratoActual->getPactosSalud() as $subitem) {
            $UltimoPactoSalud = $subitem;
            break;
        }
        
        $UltimoDescuentoPrevision = null;
        foreach($ContratoActual->getPrevision()->getDescuentosPrevision() as $subitem) {
            $UltimoDescuentoPrevision = $subitem;
            break;
        }
        
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
        
            $this->parser->parse('registro_empleados/modificar', array(
                'contrato' => array(
                    'id' => $ContratoActual->getId(),
                    'rut_empleado' => $ContratoActual->getEmpleado()->getRut(),
                    'apellidos_empleado' => $ContratoActual->getEmpleado()->getApellidos(),
                    'nombres_empleado' => $ContratoActual->getEmpleado()->getNombres(),
                    'fecha_nacimiento_empleado' => $ContratoActual->getEmpleado()->getFechaNacimiento()->getTimestamp(),
                    'direccion_empleado' => $ContratoActual->getEmpleado()->getDireccion(),
                    'id_comuna_empleado' => $ContratoActual->getEmpleado()->getComuna()->getId(),
                    'fono_empleado' => $ContratoActual->getEmpleado()->getFono(),
                    
                    'fecha_inicio' => $ContratoActual->getFechaInicio()->getTimestamp(),
                    'fecha_termino' => ($ContratoActual->getFechaTermino())? $ContratoActual->getFechaTermino()->getTimestamp() : null,
                    
                    'id_tipo_contrato' => $ContratoActual->getTipoContrato()->getId(),
                    'id_prevision' => $ContratoActual->getPrevision()->getId(),
                    'descuento_prevision' => $UltimoDescuentoPrevision->getDescuento(),
                    'id_sistema_salud' => $UltimoPactoSalud->getSistemaSalud()->getId(),
                    
                    // Revisar para que se obtenga el último pacto para el empleado
                    'pacto' => $UltimoPactoSalud->getPacto()

                ),
                'comunas' => $comunas,
                'tipos_contrato' => $tipos_contrato,
                'prevision' => $prevision,
                'sistemas_salud' => $sistemas_salud
            ));
            
        } else {
            
            $this->form_validation->set_rules('rut', null, 'required|numeric');
            $this->form_validation->set_rules('dv', null, 'required|max_length[1]|matches_modulo11[rut]');
            $this->form_validation->set_rules('apellidos', null, 'required|max_length[45]');
            $this->form_validation->set_rules('nombres', null, 'required|max_length[45]');
            $this->form_validation->set_rules('fecha_nacimiento', null, 'required|valid_date');
            $this->form_validation->set_rules('direccion', null, 'required|max_length[100]');
            $this->form_validation->set_rules('id_comuna', null, 'required|numeric');
            $this->form_validation->set_rules('fono', null, 'max_length[45]');
            
            $this->form_validation->set_rules('fecha_inicio_contrato', null, 'required|valid_date');
            $this->form_validation->set_rules('fecha_termino_contrato', null, 'valid_date');
            $this->form_validation->set_rules('id_tipo_contrato', null, 'required|numeric');
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('id_sistema_salud', null, 'required|numeric');
            $this->form_validation->set_rules('pacto_salud', null, 'numeric');
            
            // Volcado de post, ver si pasa sin excepción
//            header('Content-Type: text/plain; charset=utf-8');
//            print_r($_POST);
            //exit;
            
            if ($this->form_validation->run()) {
                
                $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
                $EmpleadoActual = $this->doctrine->em->getReference('Entities\Empleado', $ContratoActual->getEmpleado()->getRut());
                
                $EmpleadoActual->setRut($this->input->post('rut'));
                $EmpleadoActual->setApellidos($this->input->post('apellidos'));
                $EmpleadoActual->setNombres($this->input->post('nombres'));
                $EmpleadoActual->setFechaNacimiento(date_create($this->input->post('fecha_nacimiento')));
                $EmpleadoActual->setDireccion($this->input->post('direccion'));
                $EmpleadoActual->setComuna(
                    $this->doctrine->em->getReference('Entities\Comuna', $this->input->post('id_comuna'))
                );
                $EmpleadoActual->setFono($this->input->post('fono'));
                
                
                $ContratoActual->setFechaInicio(date_create($this->input->post('fecha_inicio_contrato')));
                if ($this->input->post('fecha_termino_contrato'))
                    $ContratoActual->setFechaTermino(date_create($this->input->post('fecha_termino_contrato')));
                else
                    $ContratoActual->setFechaTermino(null);
                
                $ContratoActual->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $ContratoActual->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );

                // ver si esto afecta en algo
                //$PactoSaludActual = new Entities\PactoSalud;
                $PactoSaludActual = $UltimoPactoSalud;
                
                $PactoSaludActual->setFechaPeriodo(date_create(strftime('%Y-%m-01')));
                $PactoSaludActual->setPacto($this->input->post('pacto_salud'));
                $PactoSaludActual->setSistemaSalud(
                    $this->doctrine->em->getReference('Entities\SistemaSalud', $this->input->post('id_sistema_salud'))
                );
                
                if ($this->input->post('pacto'))
                    $PactoSaludActual->setPacto($this->input->post('pacto'));
                else
                    $PactoSaludActual->setPacto(null);
                
                //$ContratoNuevo->addPactoSalud($PactoSaludNuevo);
                $PactoSaludActual->setContrato($ContratoActual);
                
                //$EmpleadoNuevo->addContrato($ContratoNuevo);
                $ContratoActual->setEmpleado($EmpleadoActual);
                
                try {
                    $this->doctrine->em->persist($EmpleadoActual);
                    $this->doctrine->em->persist($ContratoActual);
                    $this->doctrine->em->persist($PactoSaludActual);
                    $this->doctrine->em->flush();
                    
                    $this->parser->parse('registro_empleados/guardar', array());
                } catch(Exception $e) {
                    // Verificar excepción en base de datos (default para gratificacion)
                    throw $e;
                    exit;
                    $this->parser->parse('registro_empleados/error_modificar_unico', array(
                        'contrato' => array (
                            'id' => $ContratoActual->getId()
                        )
                    ));
                }
                
            } else {
            
                $this->parser->parse('registro_empleados/error_modificar', array(
                    'contrato' => array (
                        'id' => $ContratoActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
    public function baja($id) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        
        $ayer = new DateTime('yesterday');
        $ContratoActual->setFechaTermino($ayer);
        
        $this->doctrine->em->persist($ContratoActual);
        $this->doctrine->em->flush();
        
        redirect('registro_empleados');
    }
    
    public function recontratar($id) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        $EmpleadoActual = $ContratoActual->getEmpleado();
        
        $contratos_anteriores = array();
        foreach($EmpleadoActual->getContratos() as $item) {
            
            $UltimoPactoSalud = null;
            foreach($item->getPactosSalud() as $subitem) {
                $UltimoPactoSalud = $subitem;
                //break;
            }
            
            $contratos_anteriores[] = array(
                'fecha_inicio' => $item->getFechaInicio()->getTimestamp(),
                'fecha_termino' => ($item->getFechaTermino())? $item->getFechaTermino()->getTimestamp() : null,
                'cargo_tipo_contrato' => $item->getTipoContrato()->getCargo(),
                'nombre_prevision' => $item->getPrevision()->getNombre(),
                'nombre_sistema_salud' => ($UltimoPactoSalud)? $UltimoPactoSalud->getSistemaSalud()->getNombre() : null,
                'pacto_salud' => ($UltimoPactoSalud)? $UltimoPactoSalud->getPacto() : null
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
        
            $this->parser->parse('registro_empleados/recontratar', array(
                'empleado' => array(
                    'id_contrato' => $ContratoActual->getId(),
                    'rut' => $EmpleadoActual->getRut(),
                    'apellidos' => $EmpleadoActual->getApellidos(),
                    'nombres' => $EmpleadoActual->getNombres(),
                ),
                'contratos_anteriores' => $contratos_anteriores,
                'tipos_contrato' => $tipos_contrato,
                'prevision' => $prevision,
                'sistemas_salud' => $sistemas_salud
            ));
            
        } else {
            $this->form_validation->set_rules('fecha_inicio_contrato', null, 'required|valid_date');
            $this->form_validation->set_rules('fecha_termino_contrato', null, 'valid_date');
            $this->form_validation->set_rules('id_tipo_contrato', null, 'required|numeric');
            $this->form_validation->set_rules('id_prevision', null, 'required|numeric');
            $this->form_validation->set_rules('id_sistema_salud', null, 'required|numeric');
            $this->form_validation->set_rules('pacto_salud', null, 'numeric');
            
            // Volcado de post, ver si pasa sin excepción
//            header('Content-Type: text/plain; charset=utf-8');
//            print_r($_POST);
//            exit;
            
            if ($this->form_validation->run()) {
                
                $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
                $EmpleadoActual = $this->doctrine->em->getReference('Entities\Empleado', $ContratoActual->getEmpleado()->getRut());
                
                $NuevoContrato = new Entities\Contrato;
                
                $NuevoContrato->setFechaInicio(date_create($this->input->post('fecha_inicio_contrato')));
                if ($this->input->post('fecha_termino_contrato'))
                    $NuevoContrato->setFechaTermino(date_create($this->input->post('fecha_termino_contrato')));
                else
                    $NuevoContrato->setFechaTermino(null);
                
                $NuevoContrato->setTipoContrato(
                    $this->doctrine->em->getReference('Entities\TipoContrato', $this->input->post('id_tipo_contrato'))
                );
                $NuevoContrato->setPrevision(
                    $this->doctrine->em->getReference('Entities\Prevision', $this->input->post('id_prevision'))
                );

                // ver si esto afecta en algo
                //$PactoSaludActual = new Entities\PactoSalud;
                //$PactoSaludActual = $UltimoPactoSalud;
                $NuevoPactoSalud = new Entities\PactoSalud;
                
                $NuevoPactoSalud->setFechaPeriodo(date_create(strftime('%Y-%m-01')));
                $NuevoPactoSalud->setPacto($this->input->post('pacto_salud'));
                $NuevoPactoSalud->setSistemaSalud(
                    $this->doctrine->em->getReference('Entities\SistemaSalud', $this->input->post('id_sistema_salud'))
                );
                
                if ($this->input->post('pacto'))
                    $NuevoPactoSalud->setPacto($this->input->post('pacto'));
                else
                    $NuevoPactoSalud->setPacto(null);
                
                //$ContratoNuevo->addPactoSalud($PactoSaludNuevo);
                $NuevoPactoSalud->setContrato($NuevoContrato);
                
                //$EmpleadoNuevo->addContrato($ContratoNuevo);
                $NuevoContrato->setEmpleado($EmpleadoActual);
                
                try {
                    //$this->doctrine->em->persist($EmpleadoActual);
                    $this->doctrine->em->persist($NuevoContrato);
                    $this->doctrine->em->persist($NuevoPactoSalud);
                    $this->doctrine->em->flush();
                    
                    $this->parser->parse('registro_empleados/alta', array());
                } catch(Exception $e) {
                    // Verificar excepción en base de datos (default para gratificacion)
                    throw $e;
                    exit;
                    $this->parser->parse('registro_empleados/error_alta_unico', array(
                        'contrato' => array (
                            'id' => $ContratoActual->getId()
                        )
                    ));
                }
                
            } else {
            
                $this->parser->parse('registro_empleados/error_alta', array(
                    'contrato' => array (
                        'id' => $ContratoActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
    public function actualizar_pacto_salud($id) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        $EmpleadoActual = $ContratoActual->getEmpleado();
        
        $UltimoPactoSalud = null;
        foreach($ContratoActual->getPactosSalud() as $subitem) {
            $UltimoPactoSalud = $subitem;
            //break;
        }
        
        $pactos_anteriores = array();
        foreach($ContratoActual->getPactosSalud() as $item) {
            $pactos_anteriores[] = array(
                'fecha_periodo' => $item->getFechaPeriodo()->getTimeStamp(),
                'pacto' => $item->getPacto()
            );
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('registro_empleados/actualizar_pacto_salud', array(
                'empleado' => array(
                    'id_contrato' => $ContratoActual->getId(),
                    'rut' => $EmpleadoActual->getRut(),
                    'apellidos' => $EmpleadoActual->getApellidos(),
                    'nombres' => $EmpleadoActual->getNombres(),
                    'nombre_sistema_salud' => $UltimoPactoSalud->getSistemaSalud()->getNombre()
                ),
                'pactos_anteriores' => $pactos_anteriores
            ));
            
        } else {
            $this->form_validation->set_rules('pacto', null, 'required|numeric');
            
            
            if ($this->form_validation->run()) {
               
                $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
                $EmpleadoActual = $this->doctrine->em->getReference('Entities\Empleado', $ContratoActual->getEmpleado()->getRut());
                
                $UltimoPactoSalud = null;
                foreach($ContratoActual->getPactosSalud() as $subitem) {
                    $UltimoPactoSalud = $subitem;
                    //break;
                }
                
                if ($UltimoPactoSalud->getFechaPeriodo() == date_create(strftime('%Y-%m-01'))) {
                    $NuevoPactoSalud = $UltimoPactoSalud;
                    $NuevoPactoSalud->setPacto($this->input->post('pacto'));
                } else {
                    $NuevoPactoSalud = new Entities\PactoSalud;

                    $NuevoPactoSalud->setFechaPeriodo(date_create(strftime('%Y-%m-01')));
                    $NuevoPactoSalud->setPacto($this->input->post('pacto'));
                    $NuevoPactoSalud->setSistemaSalud(
                        $UltimoPactoSalud->getSistemaSalud()
                    );

                    $NuevoPactoSalud->setContrato($ContratoActual);
                }
                
                try {
                    if ($NuevoPactoSalud->getPacto() == $UltimoPactoSalud->getPacto())
                        throw(new Exception);
                    $this->doctrine->em->persist($NuevoPactoSalud);
                    $this->doctrine->em->flush();
                    $this->parser->parse('registro_empleados/pacto', array());
                } catch(Exception $e) {
                    $this->parser->parse('registro_empleados/error_pacto_unico', array(
                        'contrato' => array (
                            'id' => $ContratoActual->getId()
                        )
                    ));
                }
                
            } else {
            
                $this->parser->parse('registro_empleados/error_pacto', array(
                    'contrato' => array (
                        'id' => $ContratoActual->getId()
                    )
                ));
                
            }
        
        }
    }
    
}
