<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ApiController extends AbstractActionController
{
    public function eventsAction()
    {
        $events = $this->getPluginManager()->get('hrphpmeetup')->getEvents();
        return new JsonModel(array('events' => $events));
    }

    public function tweetsAction()
    {
        $tweets = $this->getPluginManager()->get('hrphptwitter')->getTweets();
        return new JsonModel(['tweets' => $tweets]);
    }
}
