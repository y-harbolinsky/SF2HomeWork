<?php

namespace File\DocumentBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use File\DocumentBundle\Entity\Document;

class IndexController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        return array('string' => 'asdasdsa');
    }

    /**
     * @Template()
     */
    public function uploadAction(Request $request)
    {
        $document = new Document();
        $formType = $this->get('document.form.type');
        $form = $this->createForm($formType, $document);

        $form->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($document);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'adverts'
            ));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
