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
     * Функція повертая масив заголовків, довжина яких 50 символів
     */
    public function getShortTitle()
    {
        $names = array();
        $array_titles = array();
        $normalizer = new GetSetMethodNormalizer();

        $titles = $this->entityManager->getRepository('BlogNewsBundle:Category')->findAll();

        //Перетворюю об'єкт у масив
        foreach($titles as $title)
        {
            $array_titles[] = $normalizer->normalize($title);
        }

        //Обрізаю категорії
        foreach($array_titles as $titl)
        {
            $names[] = substr($titl['name'], 0, 50);
        }

        return $names;
    }
}
