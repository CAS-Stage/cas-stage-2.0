<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
 
class MY_Form_validation extends CI_Form_validation {
   
    public function __construct()
    {
        parent::__construct();
    }

    public function matches_modulo11($dv, $rut) {
        return (modulo11($_POST[$rut]) == $dv);
    }
  
}