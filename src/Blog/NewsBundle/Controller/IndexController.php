<?php

namespace Blog\NewsBundle\Controller;

use Blog\NewsBundle\Entity\Advertisement;
use Blog\NewsBundle\Entity\Contact;
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
        $categoryTitle = $this->get('category_title');
        $categories = $categoryTitle->getShortTitles();

        return array(
            'name' => 'green',
            'categories' => $categories,
        );
    }

    /**
     * @Template()
     */
    public function contactAction()
    {
        $contactForm = new Contact();
        $formType = $this->get('contact.form.type');
        $form = $this->createForm($formType, $contactForm);

        return array('form' => $form->createView());
    }

    /**
     * @Template()
     */
    public function advertsAction()
    {
        $adverts = $this->get('blog.advertisement.repository')->findBy([],
                ['created' => 'desc']
        );

        return array(
            'adverts' => $adverts
        );
    }

    /**
     * @param $slug
     * @return array
     * @Template()
     */
    public function showAdvertAction($slug)
    {
        $advertBySlug = $this->get('blog.advertisement.repository')->findBy(
            array(
                'slug' => $slug,
            )
        );

        return array('advert' => $advertBySlug);
    }

    /**
     * @Template()
     */
    public function newAdvertAction(Request $request)
    {
        $advertisement = new Advertisement();
        $formType = $this->get('advertisement.form.type');
        $form = $this->createForm($formType, $advertisement);

        $form->handleRequest($request);
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertisement);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'adverts'
            ));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @param $id
     * @return array
     * @Template()
     */
    public function updateAdvertAction($id, Request $request)
    {
        $advert = $this->get('blog.advertisement.repository')->find($id);
        $formType = $this->get('advertisement.form.type');
        $form = $this->createForm($formType, $advert);

        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl(
                'show_advert', array('slug' => $advert->getSlug())
            ));
        }

        return array(
            'form' => $form->createView()
        );

    }

    public function deleteAdvertAction($id)
    {
        $advert = $this->get('blog.advertisement.repository')->find($id);

        if($advert)
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advert);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'adverts'
            ));
        }

        return new Response('No advert');
    }

    /**
     * @Template()
     */
    public function messageAction()
    {
        $message = $this->get('translator')->trans('hello.message');

        return array('message' => $message);
    }
}

