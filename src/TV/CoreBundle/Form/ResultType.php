<?php

namespace TV\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ResultType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position',   TextType::class)
            ->add('race',       EntityType::class, array('class' => 'TVCoreBundle:Race', 'choice_label' => 'name', 'multiple' => false, 'expanded' => false))
            ->add('rider',      EntityType::class, array('class' => 'TVCoreBundle:Rider', 'choice_label' => 'nickname', 'multiple' => false, 'expanded' => false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TV\CoreBundle\Entity\Result'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tv_corebundle_result';
    }


}
