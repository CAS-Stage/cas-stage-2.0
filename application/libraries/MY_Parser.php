<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Parser extends CI_Parser {

    protected $ci;
    protected $theme_location;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('smarty');   
    }
    
    /**
    * Analizador de plantillas a través de Smarty, extendiendo el analizador original de CodeIgniter
    * 
    * @param mixed $template
    * @param array $data
    * @param mixed $return
    */
    public function parse($template, $data, $return = FALSE, $use_theme = FALSE)
    {
        // Verificación si existe un nombre de plantilla como parámetro
        if ($template == '')
        {
            return FALSE;
        }
        
        // Si se desea obtener una determinada plantilla desde otra ubicación
        if ($use_theme != FALSE)
        {
            $this->ci->load->library('template');
            $template = "file:/".$this->template->get_theme_path().$template."";
        }
        
        // Si no se encuentra la extensión del archivo, utilizar .tpl por defecto
        if ( !stripos($template, '.') ) 
        {
            $template = $template.".tpl";
        }
        
        // Fusionar las variables en caché con las variables suministradas a la plantilla
        //$data = array_merge($data, $this->ci->load->_ci_cached_vars);
        
        // Si hay variables para asignar, entonces se asignan
        if ($data)
        {
            foreach ($data as $key => $val)
            {
                $this->ci->smarty->assign($key, $val);
            }
        }
        
        // Obtención de los datos de la plantilla como string
        $template_string = $this->ci->smarty->fetch($template);
        
        // Si no se solicita retornar el contenido de la plantilla, entonces se muestra por la salida
        if ($return == FALSE)
        {
            $this->ci->output->append_output($template_string);
        }
        
        // En caso de no haber salida, se puede retornar el contenido de la plantilla
        return $template_string;
    }
    
    public function parse_string($template, $data, $return = FALSE, $use_theme = FALSE)
    {
        return $this->parse($template, $data, $return, $use_theme);
    }

}