<?php

namespace Blog\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builderInterface, array $options)
    {
        $builderInterface->add('name', 'text', array(
            'label' => 'Enter your name: ',
            'required' => false
        ));
        $builderInterface->add('email', 'email', array(
            'label' => 'Enter your email: ',
            'required' => false
        ));
        $builderInterface->add('subject', 'text', array(
            'label' => 'Enter your subject: ',
            'required' => false
        ));
        $builderInterface->add('body', 'textarea', array(
            'label' => 'Enter your text: ',
            'required' => false
        ));
        $builderInterface->add('save', 'submit', array(
            'label' => 'Contact us'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $optionsResolverInterface)
    {
        $optionsResolverInterface->setDefaults(array(
            'data_class' => 'Blog\NewsBundle\Entity\Contact'
        ));
    }

    public function getName()
    {
        return 'contact';
    }
}
