<?php

namespace ApplicationTest\Fixture;

use Zend\Json\Json;

class TwitterApiResponseFixture
{
    public function getResponse()
    {
        $results = Json::decode($this->getJson(), Json::TYPE_OBJECT);
        $tweets = [];
        $times = ['-2 minutes', '-15 minutes', '-40 minutes', '-55 minutes', '-70 minutes', '-2 hours', '-5 hours', 'yesterday', '-2 days'];
        foreach ($times as $time) {
            $t = clone $results[0];
            $date = date(DATE_RFC822, strtotime($time));
            $t->created_at = $date;
            $tweets[] = $t;
            unset($t);
        }
        return $tweets;
    }

    private function getJson()
    {
        return '
            [{
               "created_at":"Tue Jun 24 13:59:35 +0000 2014",
               "id":481436478321725442,
               "id_str":"481436478321725442",
               "text":"Test tweet content",
               "source":"\u003ca href=\"http:\/\/twitter.com\" rel=\"nofollow\"\u003eTwitter Web Client\u003c\/a\u003e",
               "truncated":false,
               "in_reply_to_status_id":null,
               "in_reply_to_status_id_str":null,
               "in_reply_to_user_id":null,
               "in_reply_to_user_id_str":null,
               "in_reply_to_screen_name":null,
               "user":{
                  "id":2181434989,
                  "id_str":"2181434989",
                  "name":"hrphp",
                  "screen_name":"hrphpmeetup",
                  "location":"Hampton Roads",
                  "description":"",
                  "url":"http:\/\/t.co\/jidHU0cc9d",
                  "entities":{
                     "url":{
                        "urls":[
                           {
                              "url":"http:\/\/t.co\/jidHU0cc9d",
                              "expanded_url":"http:\/\/www.hrphp.org",
                              "display_url":"hrphp.org",
                              "indices":[
                                 0,
                                 22
                              ]
                           }
                        ]
                     },
                     "description":{
                        "urls":[

                        ]
                     }
                  },
                  "protected":false,
                  "followers_count":21,
                  "friends_count":51,
                  "listed_count":0,
                  "created_at":"Fri Nov 08 04:14:56 +0000 2013",
                  "favourites_count":0,
                  "utc_offset":null,
                  "time_zone":null,
                  "geo_enabled":false,
                  "verified":false,
                  "statuses_count":67,
                  "lang":"en",
                  "contributors_enabled":false,
                  "is_translator":false,
                  "is_translation_enabled":false,
                  "profile_background_color":"022330",
                  "profile_background_image_url":"http:\/\/abs.twimg.com\/images\/themes\/theme15\/bg.png",
                  "profile_background_image_url_https":"https:\/\/abs.twimg.com\/images\/themes\/theme15\/bg.png",
                  "profile_background_tile":false,
                  "profile_image_url":"testImage.jpeg",
                  "profile_image_url_https":"testImage.jpeg",
                  "profile_banner_url":"https:\/\/pbs.twimg.com\/profile_banners\/2181434989\/1403560468",
                  "profile_link_color":"0084B4",
                  "profile_sidebar_border_color":"A8C7F7",
                  "profile_sidebar_fill_color":"C0DFEC",
                  "profile_text_color":"333333",
                  "profile_use_background_image":true,
                  "default_profile":false,
                  "default_profile_image":false,
                  "following":false,
                  "follow_request_sent":false,
                  "notifications":false
               },
               "geo":null,
               "coordinates":null,
               "place":null,
               "contributors":null,
               "retweet_count":1,
               "favorite_count":0,
               "entities":{
                  "hashtags":[

                  ],
                  "symbols":[

                  ],
                  "urls":[
                     {
                        "url":"http:\/\/t.co\/LjrPw2Tvzz",
                        "expanded_url":"http:\/\/www.meetup.com\/Hampton-Roads-PHP-Meetup\/events\/190258652\/",
                        "display_url":"meetup.com\/Hampton-Roads-\u2026",
                        "indices":[
                           30,
                           52
                        ]
                     }
                  ],
                  "user_mentions":[

                  ]
               },
               "favorited":false,
               "retweeted":false,
               "possibly_sensitive":false,
               "lang":"en"
            }]
            ';
    }
}
