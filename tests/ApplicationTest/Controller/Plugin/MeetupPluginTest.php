<?php

namespace ApplicationTest\Controller\Plugin;

use Application\Controller\Plugin\MeetupPlugin;
use ApplicationTest\Fixture\MeetupApiResponseFixture;

class MeetupPluginTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Application\Controller\Plugin\MeetupPlugin */
    private $plugin;

    public function testGetEvents()
    {
        $events = $this->plugin->getEvents();
        $event = $events[0];
        $this->assertSame($event->name, 'March 2015 NY Tech Meetup and Afterparty');
        $this->assertSame($event->url, 'http://www.meetup.com/ny-tech/events/218789351/');
        $this->assertSame($event->time, 1425427200000);
        $this->assertSame(strtotime($event->date), $event->time/1000);
        $this->assertSame($event->location, 'NYU Skirball Center For The Performing Arts, 566 Laguardia Place, New York, NY');
    }

    protected function setUp()
    {
        $this->fixture = (new MeetupApiResponseFixture())->getResponse();
        $client = $this->getMock('\HrPhp\Meetup\Client', array('getEvents'));
        $client->expects($this->any())
            ->method('getEvents')
            ->will($this->returnValue($this->fixture));
        $this->plugin = new MeetupPlugin();
        $this->plugin->setClient($client);
    }
}