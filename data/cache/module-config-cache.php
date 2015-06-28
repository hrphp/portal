<?php
return array (
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Index',
            'action' => 'index',
          ),
        ),
      ),
      'api' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/api[/:action]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
          ),
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Api',
          ),
        ),
      ),
      'application' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/application',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Application\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
              'defaults' => 
              array (
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'service_manager' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\Cache\\Service\\StorageCacheAbstractServiceFactory',
      1 => 'Zend\\Log\\LoggerAbstractServiceFactory',
    ),
    'aliases' => 
    array (
      'translator' => 'MvcTranslator',
    ),
    'invokables' => 
    array (
    ),
    'factories' => 
    array (
      'TwitterApiExchange' => 'HrPhp\\Twitter\\Adapter\\Factory\\TwitterApiExchangeFactory',
      'TwitterApiExchangeAdapter' => 'HrPhp\\Twitter\\Adapter\\Factory\\TwitterApiExchangeAdapterFactory',
      'HrPhpTwitterTimeline' => 'HrPhp\\Twitter\\Factory\\TimelineFactory',
    ),
  ),
  'controller_plugins' => 
  array (
    'factories' => 
    array (
      'hrphpmeetup' => 'Application\\Controller\\Plugin\\Factory\\MeetupPluginFactory',
      'hrphptwitter' => 'Application\\Controller\\Plugin\\Factory\\TwitterPluginFactory',
    ),
  ),
  'translator' => 
  array (
    'locale' => 'en_US',
    'translation_file_patterns' => 
    array (
      0 => 
      array (
        'type' => 'gettext',
        'base_dir' => '/home/tyler/dev/hrphp/portal/module/Application/config/../language',
        'pattern' => '%s.mo',
      ),
    ),
  ),
  'controllers' => 
  array (
    'invokables' => 
    array (
      'Application\\Controller\\Index' => 'Application\\Controller\\IndexController',
      'Application\\Controller\\Events' => 'Application\\Controller\\EventsController',
      'Application\\Controller\\Api' => 'Application\\Controller\\ApiController',
    ),
  ),
  'view_manager' => 
  array (
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => '/home/tyler/dev/hrphp/portal/module/Application/config/../view/layout/layout.phtml',
      'error/404' => '/home/tyler/dev/hrphp/portal/module/Application/config/../view/error/404.phtml',
      'error/index' => '/home/tyler/dev/hrphp/portal/module/Application/config/../view/error/index.phtml',
    ),
    'template_path_stack' => 
    array (
      0 => '/home/tyler/dev/hrphp/portal/module/Application/config/../view',
    ),
    'strategies' => 
    array (
      0 => 'ViewJsonStrategy',
    ),
  ),
  'twitter' => 
  array (
    'oauth_access_token' => false,
    'oauth_access_token_secret' => false,
    'consumer_key' => false,
    'consumer_secret' => false,
  ),
  'meetup' => 
  array (
    'api_key' => false,
  ),
);