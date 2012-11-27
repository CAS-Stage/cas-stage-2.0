<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_Mensual extends CI_Controller {

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
        foreach($this->doctrine->em->getRepository('Entities\Empleado')->findBy(array(), array('apellidos' => 'ASC', 'nombres' => 'ASC', 'rut' => 'ASC')) as $item) {
            
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
                    'id_contrato' => $UltimoContrato->getId(),
                    'rut' => $item->getRut(),
                    'apellidos' => $item->getApellidos(),
                    'nombres' => $item->getNombres(),
                    'monto_anticipo_registro_mensual' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getMontoAnticipo() : null,
                    'cantidad_horas_extras_registro_mensual' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getCantidadHorasExtras() : null,
                    'bono_movilizacion_registro_mensual' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoMovilizacion() : null,
                    'bono_colacion_registro_mensual' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoColacion() : null,
                    'bono_produccion_registro_mensual' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoProduccion() : null
                );
            }
        }
        $this->parser->parse('registro_mensual/index', array(
            'empleados' => $empleados,
            'mes' => $mes
        ));
    }
    
    public function actualizar($id, $periodo_actual) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        $EmpleadoActual = $ContratoActual->getEmpleado();
        
        $RegistroMensualSeleccionado = null;
        foreach ($ContratoActual->getRegistrosMensuales() as $subitem){
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == strftime($periodo_actual.'-01')) {
                $RegistroMensualSeleccionado = $subitem;
                break;
            }
        }
        
        if (!$this->input->post()) {
        
            $this->parser->parse('registro_mensual/actualizar', array(
                'empleado' => array(
                    'id_contrato' => $ContratoActual->getId(),
                    'rut' => $EmpleadoActual->getRut(),
                    'apellidos' => $EmpleadoActual->getApellidos(),
                    'nombres' => $EmpleadoActual->getNombres()
                ),
                'registro_mensual' => array(
                    'bono_movilizacion' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoMovilizacion() : null,
                    'bono_colacion' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoColacion() : null,
                    'bono_produccion' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getBonoProduccion() : null,
                    'monto_anticipo' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getMontoAnticipo() : null,
                    'cantidad_horas_extras' => ($RegistroMensualSeleccionado)? $RegistroMensualSeleccionado->getCantidadHorasExtras() : null,
                ),
                'mes' => strftime(date_create($periodo_actual)->getTimeStamp())
            ));
            
        } else {
            
            $required_if = (
                ($this->input->post('bono_movilizacion') == '' OR $this->input->post('bono_movilizacion') == 0) AND
                ($this->input->post('bono_colacion') == '' OR $this->input->post('bono_colacion') == 0) AND
                ($this->input->post('bono_produccion') == '' OR $this->input->post('bono_produccion') == 0) AND
                ($this->input->post('monto_anticipo') == '' OR $this->input->post('monto_anticipo') == 0) AND
                ($this->input->post('cantidad_horas_extras') == '' OR $this->input->post('cantidad_horas_extras') == 0)
            )? '|required|greater_than[0]' : '';
            
            $this->form_validation->set_rules('bono_movilizacion', null, 'numeric'.$required_if);
            $this->form_validation->set_rules('bono_colacion', null, 'numeric'.$required_if);
            $this->form_validation->set_rules('bono_produccion', null, 'numeric'.$required_if);
            $this->form_validation->set_rules('monto_anticipo', null, 'numeric'.$required_if);
            $this->form_validation->set_rules('cantidad_horas_extras', null, 'numeric'.$required_if);
            
            
            if ($this->form_validation->run()) {               
                $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
                $EmpleadoActual = $this->doctrine->em->getReference('Entities\Empleado', $ContratoActual->getEmpleado()->getRut());
                
                $RegistroMensualSeleccionado = null;
                foreach ($ContratoActual->getRegistrosMensuales() as $subitem){
                    if (strftime('%Y-%m', $subitem->getFechaPeriodo()->getTimestamp()) == $periodo_actual) {
                        $RegistroMensualSeleccionado = $subitem;
                        break;
                    }
                }
                
                if (!is_null($RegistroMensualSeleccionado)) {
                    $NuevoRegistroMensual = $RegistroMensualSeleccionado;
                    $NuevoRegistroMensual->setBonoMovilizacion($this->input->post('bono_movilizacion'));
                    $NuevoRegistroMensual->setBonoColacion($this->input->post('bono_colacion'));
                    $NuevoRegistroMensual->setBonoProduccion($this->input->post('bono_produccion'));
                    $NuevoRegistroMensual->setMontoAnticipo($this->input->post('monto_anticipo'));
                    $NuevoRegistroMensual->setCantidadHorasExtras($this->input->post('cantidad_horas_extras'));
                } else {
                    $NuevoRegistroMensual = new Entities\RegistroMensual;

                    $NuevoRegistroMensual->setFechaPeriodo(date_create($periodo_actual));
                    $NuevoRegistroMensual->setBonoMovilizacion($this->input->post('bono_movilizacion'));
                    $NuevoRegistroMensual->setBonoColacion($this->input->post('bono_colacion'));
                    $NuevoRegistroMensual->setBonoProduccion($this->input->post('bono_produccion'));
                    $NuevoRegistroMensual->setMontoAnticipo($this->input->post('monto_anticipo'));
                    $NuevoRegistroMensual->setCantidadHorasExtras($this->input->post('cantidad_horas_extras'));

                    $NuevoRegistroMensual->setContrato($ContratoActual);
                }
                
                try {
                    $this->doctrine->em->persist($NuevoRegistroMensual);
                    $this->doctrine->em->flush();
                    $this->parser->parse('registro_mensual/guardar', array());
                } catch(Exception $e) {
                    $this->parser->parse('registro_mensual/error_registro_desconocido', array(
                        'contrato' => array (
                            'id' => $ContratoActual->getId()
                        )
                    ));
                }
                
            } else {
                $this->parser->parse('registro_mensual/error_registro', array(
                    'contrato' => array (
                        'id' => $ContratoActual->getId()
                    ),
                    'mes' => $periodo_actual
                ));
                
            }
        
        }
    }
    
    public function restablecer($id, $periodo_actual) {
        $ContratoActual = $this->doctrine->em->getReference('Entities\Contrato', $id);
        
        $RegistroMensualSeleccionado = null;
        foreach ($ContratoActual->getRegistrosMensuales() as $subitem){
            if (strftime('%Y-%m-01', $subitem->getFechaPeriodo()->getTimestamp()) == strftime($periodo_actual.'-01')) {
                $RegistroMensualSeleccionado = $subitem;
                break;
            }
        }
        
        $this->doctrine->em->remove($RegistroMensualSeleccionado);
        $this->doctrine->em->flush();
        
        redirect('registro_mensual/index/'.$periodo_actual);
        
    }
    
}
