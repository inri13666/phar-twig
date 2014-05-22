<?php
if (!function_exists('__def')) {
    function __def($constant, $value)
    {
        if (strlen($constant) <= 0) {
            return false;
        }
        if (!defined($constant)) {
            define($constant, $value);
            return true;
        }
        //Already Defined
        return false;
    }
}
__def('DS', DIRECTORY_SEPARATOR);

if (version_compare(PHP_VERSION, '5.3.0') < 0) {
    exit("PHP must be 5.3.0+");
}

Phar::mapPhar();
$basePath = 'phar://' . __FILE__ . '/';

/**
 * Default ENVIRONMENT
 */
__def('ENVIRONMENT', 'development');
if (!class_exists('Twig_Autoloader', false)) {
    require_once $basePath . 'Twig/Autoloader.php';
    Twig_Autoloader::register(true);
}
__HALT_COMPILER();
?>
