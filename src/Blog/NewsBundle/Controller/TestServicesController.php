<?php

namespace Blog\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class TestServicesController extends Controller
{
    /**
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction()
    {
        $stringToUpper = 'text in lowercase to upper';
        $stringToLower = 'TEXT IN UPPERCASE TO LOWER';

        $service = $this->get('test_service');

        return array(
            'testString1' => $service->toUpper($stringToUpper),
            'testString2' => $service->toLower($stringToLower)
        );
    }

    /**
     * @Template()
     */
    public function sendAction()
    {
        $myMailer = $this->get('my_mailer');

        $myMailer->sendEmail();

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

        $allComments = $commentRepository->findAll();

        return array('comments' => $allComments);
    }
}
