<?php

namespace Blog\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $string = 'text in lowercase to upper';
        $string1 = 'TEXT IN UPPERCASE TO LOWER';

        $service = $this->get('test_service');

        return array(
            'str' => $service->toUpper($string),
            'str1' => $service->toLower($string1)
        );
    }

    /**
     * @Template()
     */
    public function sendAction()
    {
        $m = $this->get('my_mailer');

        $m->sendEmail();

        return array(
            'name' => 'name'
        );
    }
}
