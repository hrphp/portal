<?php

namespace ApplicationTest\Controller;

use ApplicationTest\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Application\Controller\ApiController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

class ApiControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller = new ApiController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);
    }

    public function testEventsActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'events');
        $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testTweetsActionCanBeAccessed()
    {
        $this->routeMatch->setParam('action', 'tweets');
        $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }
}
