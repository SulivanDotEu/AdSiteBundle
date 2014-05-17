<?php

namespace Walva\AdSiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampagneType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('creationDate')
            ->add('editionDate')
            ->add('owner')
            ->add('spaces')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\AdSiteBundle\Entity\Campagne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_adsitebundle_campagne';
    }
}
