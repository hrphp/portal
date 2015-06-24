<?php
namespace Application\Controller\Plugin\Factory;

use Application\Controller\Plugin\MeetupPlugin;
use Zend\Di\ServiceLocator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MeetupPluginFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $sl = $sm->getServiceLocator();
        $client = $sl->get('hrphpmeetupclient');
        $plugin = new MeetupPlugin();
        $plugin->setClient($client);
        return $plugin;
    }
}
