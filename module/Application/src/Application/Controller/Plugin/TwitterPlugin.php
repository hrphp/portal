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
            $ago = round((time() - strtotime($result->created_at))/3600, 2);
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
            } elseif ($ago < 48) {
                $tweet->ago = 'yesterday';
            } else {
                $tweet->ago = sprintf('%d days ago', round($ago/24));
            }
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
}
