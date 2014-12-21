<?php

namespace Blog\NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Template("BlogNewsBundle:Index:index.html.twig")
     * @return array
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('BlogNewsBundle:Category')
                            ->findAll();

        return array(
            'name' => 'green',
            'categories' => $categories
        );
    }
}
