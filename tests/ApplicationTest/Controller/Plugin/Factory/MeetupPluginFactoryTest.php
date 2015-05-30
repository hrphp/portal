<?php

namespace ApplicationTest\Controller\Plugin;
use Application\Controller\Plugin\Factory\MeetupPluginFactory;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\ServiceManager;

class MeetupPluginFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateService()
    {
        $mockControllerManager = new ControllerManager();
        $mockServiceManager = new ServiceManager();
        $mockHrphpClient = $this->getMock('HrPhp\Meetup\Client');
        $mockServiceManager->setService('hrphpmeetupclient', $mockHrphpClient);
        $mockControllerManager->setServiceLocator($mockServiceManager);

        $factory = new MeetupPluginFactory();
        $this->assertInstanceOf('Application\Controller\Plugin\MeetupPlugin', $factory->createService($mockControllerManager));
    }

}