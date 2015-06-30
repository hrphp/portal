<?php
namespace Application\Controller\Plugin\Factory;

use Application\Controller\Plugin\TwitterPlugin;
use Zend\Di\ServiceLocator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwitterPluginFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $sl = $sm->getServiceLocator();
        $client = $sl->get('hrphptwittertimeline');
        $plugin = new TwitterPlugin();
        $plugin->setClient($client);
        return $plugin;
    }
}
