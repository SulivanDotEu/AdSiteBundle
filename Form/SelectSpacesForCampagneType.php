<?php

namespace Walva\AdSiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SelectSpacesForCampagneType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('name', null, array(
//                    'label' => 'form.campagne.labels.name'
//                ))
//            ->add('creationDate', null, array(
//                    'label' => 'form.campagne.labels.creationDate'
//                ))
//            ->add('editionDate', null, array(
//                    'label' => 'form.campagne.labels.editionDate'
//                ))
//            ->add('owner', null, array(
//                    'label' => 'form.campagne.labels.owner'
//                ))
            ->add('spaces', 'entity', array(
                    'class' => 'Walva\AdSiteBundle\Entity\Space',
                    'label' => 'form.campagne.labels.format'
                ))
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
