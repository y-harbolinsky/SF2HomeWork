<?php

namespace Blog\NewsBundle\Services;

class AdvertisementFormCreate
{
    private $formType;
    private $formEntity;
    private $formFactory;

    function __construct($formType, $formEntity, $formFactory)
    {
        $this->formType = $formType;
        $this->formEntity = $formEntity;
        $this->formFactory = $formFactory;
    }

    public function createForm()
    {
        return $this->formFactory->createForm($this->formType, $this->formEntity);
    }
}

