<?php

return array(
    'router' => require __DIR__ . '/router.config.php',
    'service_manager' => require __DIR__ . '/service_manager.config.php',
    'controller_plugins' => require __DIR__ . '/controller_plugins.config.php',
    'translator' => require __DIR__ . '/translator.config.php',
    'controllers' => require __DIR__ . '/controllers.config.php',
    'view_manager' => require __DIR__ . '/view_manager.config.php',

    'twitter' => array(
        'oauth_access_token'        => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
        'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
        'consumer_key'              => getenv('TWITTER_CONSUMER_KEY'),
        'consumer_secret'           => getenv('TWITTER_CONSUMER_SECRET'),
    ),
    'meetup' => array(
        'api_key' => getenv('MEETUP_API_KEY'),
    ),
);
