<?php

namespace Blog\NewsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function getCategories()
    {
        return $this->findAll();
    }

    public function getCategoryById($slug)
    {
        return $this->findBy(array('slug' => $slug));
    }
}
