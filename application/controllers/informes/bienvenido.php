<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bienvenido extends CI_Controller {

    public function index() {              
        $this->parser->parse('informes/index', array('usuario' => Access::get_current_user()));
    }
    
}
