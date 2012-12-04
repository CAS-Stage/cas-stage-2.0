<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bienvenido extends CI_Controller {

    public function index() { 
        //var_dump($this->session->userdata('uid'));
        //exit;
        if ($this->session->userdata('uid') !== false) {
                //if ($usuario['perfil'] == 'Lectura')
                    redirect('bienvenido/menu');
                //else
                //   $this->parser->parse('bienvenido/index', array('usuario' => Access::get_current_user()));
        } else {
                $retval = (count($_POST) == 2)? $this->auth->login($this->input->post('username'), $this->input->post('password')) : null;

                $data = array(
                    'retval' => $retval
                );

                if ($retval)
                        redirect('bienvenido/menu');
                else {
                        if (count($_POST) == 2)
                            $this->parser->parse('bienvenido/login_error', $data);
                        else
                            $this->parser->parse('bienvenido/login', $data);
                }
        }
        
        
    }
    
    public function menu() {
        //var_dump($this->session->userdata('uid'));
        //exit;
        $usuario = Access::get_current_user();
        if ($usuario['perfil'] == 'Lectura')
            redirect('informes');
        else
            $this->parser->parse('bienvenido/index', array('usuario' => Access::get_current_user()));
    }
    
    function logout()
    {
            $this->auth->logout();
            redirect(null);
    }
    
}
