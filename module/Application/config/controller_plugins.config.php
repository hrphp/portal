<?php

use Application\Controller\Plugin;

return array(
    'factories' => array(
        'hrphpmeetup' => 'Application\Controller\Plugin\Factory\MeetupPluginFactory',
        'hrphptwitter' =>'Application\Controller\Plugin\Factory\TwitterPluginFactory',
    ),
);
