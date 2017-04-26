<?php

namespace TV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RaceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',           TextType::class)
            ->add('date',           DateType::class)
            ->add('profile',        EntityType::class, array('class' => 'TVCoreBundle:Profile', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('flag',           EntityType::class, array('class' => 'TVCoreBundle:Flag', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('classification', EntityType::class, array('class' => 'TVCoreBundle:Classification', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('logo',           TextType::class)
            ->add('profilepic',     TextType::class)
            ->add('save',           SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TV\CoreBundle\Entity\Race'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tv_corebundle_race';
    }


}
