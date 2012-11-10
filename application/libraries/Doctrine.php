<?php

class Doctrine
{
    // el entity manager de Doctrine
    public $em = null;

    public function __construct()
    {
        // inclusión de la configuración de base de datos de la aplicación CodeIgniter
        require_once APPPATH.'config/database.php';
        
        // inclusión del ClassLoader de Doctrine
        require_once 'Doctrine/Common/ClassLoader.php';

        // carga de las clases de Doctrine
        $doctrineClassLoader = new \Doctrine\Common\ClassLoader('Doctrine');
        $doctrineClassLoader->register();
        
        // carga de los helpers de Symfony2
        // Esto es necesario solo para los mappers YAML
        $symfonyClassLoader = new \Doctrine\Common\ClassLoader('Symfony', 'Doctrine');
        $symfonyClassLoader->register();

        // carga de las entidades
        $entityClassLoader = new \Doctrine\Common\ClassLoader('Entities', APPPATH.'models');
        $entityClassLoader->register();

        // carga de las entidades proxy
        $proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', APPPATH.'models');
        $proxyClassLoader->register();

        // ajustes de configuración
        $config = new \Doctrine\ORM\Configuration;
    
        if(ENVIRONMENT == 'development')
            // configuración de caché de array en modo desarrollo
            $cache = new \Doctrine\Common\Cache\ArrayCache;
        else
            // configuración de caché con APC en modo producción
            $cache = new \Doctrine\Common\Cache\ApcCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // configuración de entidades proxy
        $config->setProxyDir(APPPATH.'models/Proxies');
        $config->setProxyNamespace('Proxies');
        
        // autogeneración de clases proxy si se está en modo desarrollo
        $config->setAutoGenerateProxyClasses(ENVIRONMENT == 'development');

        // ajustes del driver de anotaciones
        $yamlDriver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(APPPATH.'models/Mappings');
        $config->setMetadataDriverImpl($yamlDriver);

        // Información para conectar a la base de datos
        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'user' => $db['default']['username'],
            'password' => $db['default']['password'],
            'host' => $db['default']['hostname'],
            'dbname' => $db['default']['database'],
			'driverOptions' => array(
				1002 => 'SET NAMES utf8'
			)
        );
        
        // creación del EntityManager
        $em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
        
        // almacenamiento de $em (EntityManager) como miembro de la clase, para utilizarlo en los controladores de CodeIgniter
        $this->em = $em;
    }
}