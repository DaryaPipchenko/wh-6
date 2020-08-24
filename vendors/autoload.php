<?php
class AutoloaderClass
{
    public function addNamespace(string $prefix, string $dir)
    {
        $prefix = trim($prefix, '\\') . '\\';

        $dir = rtrim($dir, DIRECTORY_SEPARATOR) . '/';
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        $prefix = $class;

        require_once $class;
    }
}

$autoloader = new AutoloaderClass;
$autoloader->addNamespace('Hillel\Wh6', '/src' );
$autoloader->register();