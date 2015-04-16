<?php

namespace File\DocumentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilderInterface, array $options)
    {
        $formBuilderInterface
            ->add('name', 'text', array(
                'label' => 'Enter your name: ',
            ))
            ->add('file', 'file', array(
                'label' => 'Enter file: ',
            ))
            ->add('Save', 'submit', array(
                'label' => 'Save file'
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $optionsResolverInterface)
    {
        $optionsResolverInterface->setDefaults(array(
            'data_class' => 'File\DocumentBundle\Entity\Document'
        ));
    }

    public function getName()
    {
        return 'document';
    }
}
