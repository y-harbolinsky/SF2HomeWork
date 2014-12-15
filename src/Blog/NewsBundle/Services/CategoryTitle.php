<?php

namespace Blog\NewsBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class CategoryTitle
{
    private $entityManager;

    function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    /**
     * @return array
     */
    public function getShortTitle()
    {
        $names = array();
        $array_titles = array();
        $normalizer = new GetSetMethodNormalizer();

        $titles = $this->entityManager->getRepository('BlogNewsBundle:Category')->findAll();

        //object to array
        foreach($titles as $title)
        {
            $array_titles[] = $normalizer->normalize($title);
        }

        //cut title
        foreach($array_titles as $title)
        {
            $names[] = substr($title['name'], 0, 50);
        }

        return $names;
    }
}
