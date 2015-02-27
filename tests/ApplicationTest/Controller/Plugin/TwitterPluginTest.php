<?php

namespace ApplicationTest\Controller\Plugin;

use Application\Controller\Plugin\TwitterPlugin;
use ApplicationTest\Fixture\TwitterApiResponseFixture;

class TwitterPluginTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Application\Controller\Plugin\TwitterPlugin */
    private $plugin;
    private $fixture;

    public function testGetTweets()
    {
        $tweets = $this->plugin->getTweets();
        $this->assertSame($tweets[0]->url, 'https://twitter.com/hrphpmeetup/statuses/481436478321725442');
        $this->assertSame('Test tweet content...', $tweets[0]->excerpt);
        $this->assertSame('just now', $tweets[0]->ago);
        $this->assertSame('15 minutes ago', $tweets[1]->ago);
        $this->assertSame('less than an hour ago', $tweets[3]->ago);
        $this->assertSame('about an hour ago', $tweets[4]->ago);
        $this->assertSame('2 hours ago', $tweets[5]->ago);
        $this->assertSame('5 hours ago', $tweets[6]->ago);
        $this->assertSame('yesterday', $tweets[7]->ago);
        $this->assertSame('2 days ago', $tweets[8]->ago);
    }

    protected function setUp()
    {
        $this->fixture = (new TwitterApiResponseFixture())->getResponse();
        $client = $this->getMock('\HrPhp\Twitter\Timeline', array('get'));
        $client->expects($this->any())
            ->method('get')
            ->will($this->returnValue($this->fixture));
        $this->plugin = new TwitterPlugin();
        $this->plugin->setClient($client);
    }
}