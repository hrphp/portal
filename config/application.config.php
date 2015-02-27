<?php
/**
 * Application Configuration
 *
 * While this file allows you to control a wide array of options, this project
 * relies on this file for 2 things: configuration paths and module
 * registration. The configuration paths are handled by the 'config_glob_paths'
 * settings and can remain untouched. Module namespaces, however, should be
 * added to the 'modules' array while module paths should be added to the
 * 'module_paths' array.
 */

return array(
    'config_glob_paths' => array(
        dirname(__DIR__) . '/config/autoload/{,*.}{global,local}.php',
    ),

    'modules' => array(
        'Application',
        'HrPhp\Twitter',
        'HrPhp\Meetup',
    ),

    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            'HrPhp\Twitter' => dirname(__DIR__) . '/vendor/hrphp/hrphp-twitter',
            'HrPhp\Meetup'  => dirname(__DIR__) . '/vendor/hrphp/hrphp-meetup',
        )
    )
);
