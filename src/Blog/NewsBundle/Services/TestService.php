<?php

namespace Blog\NewsBundle\Services;

class TestService
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
