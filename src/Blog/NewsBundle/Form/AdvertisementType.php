<?php

namespace Blog\NewsBundle\Form;

use Blog\NewsBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdvertisementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilderInterface, array $options)
    {
        $formBuilderInterface
            ->add('title', 'text', array(
                'label' => 'Enter your title: ',
                'required' => true
            ))
            ->add('content', 'textarea', array(
                'label' => 'Enter content: ',
                'required' => true
            ))
            ->add('category', 'entity', array(
                'class' => 'BlogNewsBundle:Category',
                'property' => 'name'
            ))
            ->add('moderator', 'entity', array(
                'class' => 'BlogNewsBundle:User',
                'property' => 'firstName'
            ))
            ->add('Save', 'submit', array(
                'label' => 'Save'
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $optionsResolverInterface)
    {
        $optionsResolverInterface->setDefaults(array(
            'data_class' => 'Blog\NewsBundle\Entity\Advertisement'
        ));
    }

    public function getName()
    {
        return 'advertisement';
    }
}
