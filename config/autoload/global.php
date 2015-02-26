<?php

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
