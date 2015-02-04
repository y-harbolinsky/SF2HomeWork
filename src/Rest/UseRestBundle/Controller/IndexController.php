<?php

namespace Rest\UseRestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        return array('string' => 'Hello REST!');
    }
}
