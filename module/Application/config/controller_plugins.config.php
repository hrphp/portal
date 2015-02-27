<?php

use Application\Controller\Plugin;

return array(
    'factories' => array(
        'hrphpmeetup' => function($sm) {
            $sl = $sm->getServiceLocator();
            $client = $sl->get('hrphpmeetupclient');
            $plugin = new Plugin\MeetupPlugin();
            $plugin->setClient($client);
            return $plugin;
        },
        'hrphptwitter' => function($sm) {
            $sl = $sm->getServiceLocator();
            $client = $sl->get('hrphptwittertimeline');
            $plugin = new Plugin\TwitterPlugin();
            $plugin->setClient($client);
            return $plugin;
        },
    ),
);
