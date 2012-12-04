<?php

class Access {

	var $CI;

	function Access()
	{
		$this->CI =& get_instance();
	}
	
	function get_current_user()
	{
                try {
                    $user = $this->doctrine->em->getReference('Entities\Usuario', $this->session->userdata('uid'));
                    if ($user)
                        return array(
                            'username' => $user->getUsername(),
                            'perfil' => $user->getPerfil(),
                            'nombre' => $user->getNombre()
                        );
                    else
                        return array();
                } catch(Exception $e) {
                    return array();
                }
	}
	
	function authorize()
	{   
                $directory = substr($this->CI->router->directory, 0, -1);
		$class = $this->CI->router->class;
		$method = $this->CI->router->method;

                $skip = ($directory == '' AND $class == 'bienvenido' AND ($method == 'index' OR $method== 'logout'));
                
                if ($this->CI->session->userdata('uid') === false) {
                    
                    if (!$skip) {
                        redirect('');
                    }
                    
                    
                }
                
                if ($this->CI->session->userdata('uid') !== false) {
                    if (!$skip) {
                        if (!$this->check_access($this->CI->session->userdata('uid'), $directory, $class, $method)) {
                            redirect('');
                        }
                    }
                }
	}
        
        function check_access($uid, $directory, $class, $method) { 
            // Acceso a menú
            $menu = ($directory == '' AND $class == 'bienvenido' AND $method == 'menu');
            
            // Acceso a informes
            $informes = ($directory == 'informes');
            
            // Acceso a parámetros externos
            $parametros_externos = ($directory == 'parametros_externos');
            
            // Acceso a otros módulos
            $otros = ($directory == '' AND $class != 'bienvenido' AND $method != 'menu');
            
            $user = $this->CI->doctrine->em->getReference('Entities\Usuario', $uid);
            
            $perfil = $user->getPerfil();
            
            switch($perfil) {
                case 'Lectura':
                    return ($menu OR $informes);
                case 'Lectura y escritura':
                    return ($menu OR $informes OR $parametros_externos OR $otros);
                default:
                    return false;
            }
        }
}

/* End of file Access.php */
/* Location: ./system/application/hooks/Access.php */
