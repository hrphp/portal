<?php

return array(
    'modules' => array(
        'Application',
        'HrPhp\Twitter',
        'HrPhp\Meetup',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            dirname(dirname(__DIR__)) . '/config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            'HrPhp\Twitter' => dirname(dirname(__DIR__)) . '/vendor/hrphp/hrphp-twitter',
            'HrPhp\Meetup' => dirname(dirname(__DIR__)) . '/vendor/hrphp/hrphp-meetup',
        ),
    )
);
