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

        $r = $this->get('category_title');

        return array(
            'str' => $r->toUpper($string),
            'str1' => $r->toLower($string1)
        );
    }
}
