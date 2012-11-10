<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// El directorio de las vistas con un slash al final
$config['template_directory'] = APPPATH."views/";

// Lugar en donde las plantillas se compilan
$config['compile_directory']  = APPPATH."cache/smarty/compiled";

// Lugar en donde las plantillas se almacenan en caché
$config['cache_directory']    = APPPATH."cache/smarty/cached";

// Lugar en donde se encuentran las configuraciones de Smarty
$config['config_directory']   = APPPATH."third_party/Smarty/configs";