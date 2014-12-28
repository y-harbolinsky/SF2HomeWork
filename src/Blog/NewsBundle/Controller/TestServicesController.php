<?php

namespace Blog\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestServicesController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $stringToUpper = 'text in lowercase to upper';
        $stringToLower = 'TEXT IN UPPERCASE TO LOWER';

        $service = $this->get('test_service');

        return array(
            'str' => $service->toUpper($stringToUpper),
            'str1' => $service->toLower($stringToLower)
        );
    }

    /**
     * @Template()
     */
    public function sendAction()
    {
        $message = $this->get('my_mailer');

        $message->sendEmail();

        return array(
            'message' => 'name'
        );
    }

    /**
     * @Template()
     */
    public function commentAction()
    {
        $commentRepository = $this->get('blog.news.comment_repository');

        $allComments = $commentRepository->getAllComments();

        return array('comments' => $allComments);
    }
}
