<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'phar://' . implode(DIRECTORY_SEPARATOR, array(dirname(dirname(__FILE__)), 'compiled', 'twig.bz2'));

$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates');
$twig = new Twig_Environment($loader, array(
    //'debug' =>true,
    'cache' => sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'compilation_cache',
    'auto_reload' => true,
));

$template = $twig->loadTemplate('test.twig');
$template->display(array('title' => 'Yahoo'));
