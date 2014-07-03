<?php
return array(
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory'
    ),
    'aliases' => array(
        'translator' => 'MvcTranslator'
    )
);
