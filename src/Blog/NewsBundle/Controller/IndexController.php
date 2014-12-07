<?php

namespace Blog\NewsBundle\Controller;

use Blog\NewsBundle\Entity\Advertisement;
use Blog\NewsBundle\Entity\Contact;
use Blog\NewsBundle\Form\AdvertisementType;
use Blog\NewsBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Template
     */
    public function contactAction()
    {
        $contactForm = new Contact();
        $form = $this->createForm(new ContactType(), $contactForm);

        var_dump($_POST);

        return array('form' => $form->createView());
    }

    /**
     * @Template()
     */
    public function advertFormAction()
    {
        $advertisementForm = new Advertisement();
        $form = $this->createForm(new AdvertisementType(), $advertisementForm);

        return array(
            'form' => $form->createView()
        );
    }
}
