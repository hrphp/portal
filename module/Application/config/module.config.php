<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
$config_dir = __DIR__;

return array(
    'router' => require $config_dir . '/router.config.php',
    'service_manager' => require $config_dir . '/service_manager.config.php',
    'translator' => require $config_dir . '/translator.config.php',
    'controllers' => require __DIR__ . '/controllers.config.php',
    'view_manager' => require __DIR__ . '/view_manager.config.php'
);
