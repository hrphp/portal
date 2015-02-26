<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'twitter' => [
        'oauth_access_token' => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
        'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
        'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
        'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET'),
    ],
    'meetup' => [
        'api_key' => getenv('MEETUP_API_KEY')
    ]
];
