<?php

namespace PlataformaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PersonasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dni', TextType::class, array('label' => 'Dni'))
                ->add('apellido', TextType::class, array('label' => 'Apellido'))
                ->add('nombre', TextType::class, array('label' => 'Nombre'))
                ->add('direccion', TextType::class, array('label' => 'Direccion'))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlataformaBundle\Entity\Personas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'plataformabundle_personas';
    }


}
