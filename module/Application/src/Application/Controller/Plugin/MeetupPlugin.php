<?php

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class MeetupPlugin extends AbstractPlugin
{
    use ClientAwareTrait;

    /**
     * @return array
     */
    public function getEvents()
    {
        $results = $this->getRawEvents();
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
        return $events;
    }

    /**
     * @return array
     */
    public function getRawEvents()
    {
        $options = array('group_urlname' => 'Hampton-Roads-PHP-Meetup');
        return $this->getClient()->getEvents($options);
    }
}
