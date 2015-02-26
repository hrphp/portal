<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $twitter = $this->getServiceLocator()->get('HrPhpTwitterTimeline');
        $tweets = $twitter->get('hrphpmeetup');

        $meetup = $this->getServiceLocator()->get('HrPhpMeetupClient');
        $events = $meetup->getEvents(['group_urlname' => 'Hampton-Roads-PHP-Meetup']);
        return new ViewModel(['tweets' => $tweets, 'events' => $events->results]);
    }
}
