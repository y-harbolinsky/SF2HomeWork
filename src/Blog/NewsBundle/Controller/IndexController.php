<?php

namespace Blog\NewsBundle\Controller;

use Blog\NewsBundle\Entity\Advertisement;
use Blog\NewsBundle\Entity\Contact;
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
        $category_title = $this->get('category_title');
        $categories = $category_title->getShortTitles();

        return array(
            'name' => 'green',
            'categories' => $categories
        );
    }

    /**
     * @Template()
     */
    public function contactAction()
    {
        $contactForm = new Contact();
        $form = $this->createForm(new ContactType(), $contactForm);

        return array('form' => $form->createView());
    }

    /**
     * @Template()
     */
    public function advertFormAction()
    {
        $advertisementForm = new Advertisement();
        $formType = $this->get('advertisement.form.type');
        $form = $this->createForm($formType, $advertisementForm);

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
            $advertisement->setTitle($request->get('title'));
            $advertisement->setContent($request->get('content'));
        }

        return new Response('New response');
    }
}

