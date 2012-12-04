<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

	var $CI;

	function Auth()
	{
		$this->CI =& get_instance();
	}
	
	function login($username, $password)
	{   
                $user = $this->CI->doctrine->em->getRepository('Entities\Usuario')->findOneByUsername($username);
                if ($user) {
                    if ($user->getPassword() == sha1($password, true)) {
                        $this->CI->session->set_userdata('uid', $user->getId());
                        return true;
                    } else
                        return false;
                } else
                    return false;
	}
	
	function logout()
	{
		$this->CI->session->sess_destroy();
	}

}

// END Auth class

/* End of file Auth.php */
/* Location: ./system/applications/libraries/Auth.php */