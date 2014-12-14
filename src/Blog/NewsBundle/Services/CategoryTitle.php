<?php

namespace Blog\NewsBundle\Services;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;

class CategoryTitle
{
    public function toUpper($str)
    {
        return strtoupper($str);
    }

    public function toLower($str)
    {
        return strtolower($str);
    }

    public function getGoodTitle()
    {
        return 'hello';
    }
}
