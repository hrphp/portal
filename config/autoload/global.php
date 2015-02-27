<?php
/**
 * Global Configuration
 *
 * For simplicity's sake, all module settings exist here. In keeping with
 * certain concepts pertaining to application configuration -- particularly
 * those detailed at http://12factor.net/config -- this project defaults to the
 * use of environment variables for storing sensitive information such as
 * datastore credentials, API keys, etc. This practice makes the use of a local
 * configuration file unnecessary; the use of a local configuration file is,
 * however, supported by this project. See the local.php.dist file that ships
 * with this project for more details about local configuration.
 */

return [
    'twitter' => [
        'oauth_access_token'        => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
        'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
        'consumer_key'              => getenv('TWITTER_CONSUMER_KEY'),
        'consumer_secret'           => getenv('TWITTER_CONSUMER_SECRET'),
    ],
    'meetup' => [
        'api_key' => getenv('MEETUP_API_KEY')
    ]
];
