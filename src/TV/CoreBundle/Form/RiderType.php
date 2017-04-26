<?php

namespace TV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RiderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('forename',   TextType::class)
            ->add('name',       TextType::class)
            ->add('nickname',   TextType::class)
            ->add('flag',       EntityType::class, array('class' => 'TVCoreBundle:Flag', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('team',       EntityType::class, array('class' => 'TVCoreBundle:Team', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('save',       SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TV\CoreBundle\Entity\Rider'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tv_corebundle_rider';
    }


}
