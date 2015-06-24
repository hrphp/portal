<?php

namespace ApplicationTest\Controller\Plugin;
use Application\Controller\Plugin\Factory\TwitterPluginFactory;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\ServiceManager;

class TwitterPluginFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateService()
    {
        $mockControllerManager = new ControllerManager();
        $mockServiceManager = new ServiceManager();
        $mockTwitterClient = $this->getMock('HrPhp\Twitter\Timeline');
        $mockServiceManager->setService('hrphptwittertimeline', $mockTwitterClient);
        $mockControllerManager->setServiceLocator($mockServiceManager);

        $factory = new TwitterPluginFactory();
        $this->assertInstanceOf('Application\Controller\Plugin\TwitterPlugin', $factory->createService($mockControllerManager));
    }

}
