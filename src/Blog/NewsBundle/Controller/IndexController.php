<?php

namespace Blog\NewsBundle\Controller;

use Blog\NewsBundle\Entity\Advertisement;
use Blog\NewsBundle\Entity\Contact;
use Blog\NewsBundle\Form\AdvertisementType;
use Blog\NewsBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        var_dump($_POST);

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @param Request $request
     * @Template()
     */
    public function createAdvertisementAction(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $advertisement = new Advertisement();

//            var_dump($request->request->get('advertisement'));
//            var_dump($request->request->get('content'));
//            var_dump($request->request->);

            $advertisement->setTitle($request->get('title'));
            $advertisement->setContent($request->get('content'));
        }
        var_dump($_POST);

        return new Response('New response');
    }
}

