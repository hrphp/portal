<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ApiController extends AbstractActionController
{
    public function eventsAction()
    {
        $meetup = $this->getServiceLocator()->get('HrPhpMeetupClient');
        $results = $meetup->getEvents(['group_urlname' => 'Hampton-Roads-PHP-Meetup']);
        $events = [];
        foreach ($results->results as $result) {
            $event = new \stdClass();
            $event->name = $result->name;
            $event->url = $result->event_url;
            $event->time = $result->time;
            $event->date = date('F j, Y g:i A T', $result->time/1000);
            $event->location = sprintf(
                '%s, %s, %s, %s',
                $result->venue->name,
                $result->venue->address_1,
                $result->venue->city,
                $result->venue->state
            );
            $events[] = $event;
        }
        return new JsonModel(['events' => $events]);
    }

    public function tweetsAction()
    {
        $twitter = $this->getServiceLocator()->get('HrPhpTwitterTimeline');
        $results = $twitter->get('hrphpmeetup');
        $tweets = [];
        foreach ($results as $result) {
            $tweet = new \stdClass();
            $tweet->url = sprintf('https://twitter.com/hrphpmeetup/statuses/%d', $result->id);
            $tweet->excerpt = substr_replace($result->text, '...', 75);
            $ago = round((time() - strtotime($result->created_at))/3600, 1);
            if ($ago < .1) {
                $tweet->ago = 'just now';
            } elseif ($ago < .5) {
                $tweet->ago = sprintf('%d minutes ago', round($ago*60));
            } elseif ($ago < 1) {
                $tweet->ago = 'less than an hour ago';
            } elseif ($ago < 1.5) {
                $tweet->ago = 'about an hour ago';
            } elseif ($ago < 2.5) {
                $tweet->ago = '2 hours ago';
            } elseif ($ago < 24) {
                $tweet->ago = sprintf('%d hours ago', $ago);
            } else {
                $tweet->ago = sprintf('%d days ago', round($ago/24));
            }
            $tweets[] = $tweet;
        }
        return new JsonModel(['tweets' => $tweets]);
    }
}
