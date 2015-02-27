<?php

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class TwitterPlugin extends AbstractPlugin
{
    use ClientAwareTrait;

    /**
     * @return array
     */
    public function getTweets()
    {
        $results = $this->getRawTweets();
        $tweets = [];
        foreach ($results as $result) {
            $tweet = new \stdClass();
            $tweet->url = sprintf('https://twitter.com/hrphpmeetup/statuses/%d', $result->id);
            $tweet->excerpt = substr_replace($result->text, '...', 75);
            $tweet->ago = $this->getTweetAgo($result->created_at);
            $tweets[] = $tweet;
        }
        return $tweets;
    }

    /**
     * @return array
     */
    public function getRawTweets()
    {
        return $this->getClient()->get('hrphpmeetup');
    }

    /**
     * @param int $datetime
     * @return string
     */
    private function getTweetAgo($datetime)
    {
        $ago = round((time() - strtotime($datetime))/3600, 2);
        if ($ago < .1) {
            return 'just now';
        }
        if ($ago < .5) {
            return sprintf('%d minutes ago', round($ago*60));
        }
        if ($ago < 1) {
            return 'less than an hour ago';
        }
        if ($ago < 1.5) {
            return 'about an hour ago';
        }
        if ($ago < 2.5) {
            return '2 hours ago';
        }
        if ($ago < 24) {
            return sprintf('%d hours ago', $ago);
        }
        if ($ago < 48) {
            return 'yesterday';
        }
        return sprintf('%d days ago', round($ago/24));
    }
}
