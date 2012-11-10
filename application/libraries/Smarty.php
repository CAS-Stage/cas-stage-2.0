<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."third_party/Smarty/libs/Smarty.class.php";

class CI_Smarty extends Smarty {

    // Instancia de CodeIgniter
    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // Almacenamiento de la instancia superglobal de CodeIgniter dentro de la clase de Smarty
        $this->CI =& get_instance();

        $this->CI->load->config('smarty');

        $this->template_dir      = $this->CI->config->item('template_directory');
        $this->compile_dir       = $this->CI->config->item('compile_directory');
        $this->cache_dir         = $this->CI->config->item('cache_directory');
        $this->config_dir        = $this->CI->config->item('config_directory');
        $this->exception_handler = null;

        // Registro de los helpers de CodeIgniter como plugins de Smarty
        $helpers = glob(APPPATH . 'helpers/*', GLOB_ONLYDIR | GLOB_MARK);
		if (is_array($helpers))
			foreach ($helpers as $helper)
			{
				$this->plugins_dir[] = $helper;
			}

        // Asignación por referencia
        if ( method_exists( $this, 'assignByRef') )
        {
            $this->assignByRef("this", $this->CI);
        }

    }

}