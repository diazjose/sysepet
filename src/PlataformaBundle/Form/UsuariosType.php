<?php

namespace PlataformaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', TextType::class, array('label' => 'Nombre de Usuario'))
                ->add('email', EmailType::class, array('label' => 'Email'))
                ->add('plainPassword', RepeatedType::class, array(
                                'type' => PasswordType::class,
                                'first_options'  => array('label' => 'Password'),
                                'second_options' => array('label' => 'Repetir Password')
                            ))
                ->add('role', ChoiceType::class, array(
                               'choices' => array('Director' => 'ROLE_SUPER_ADMIN', 'Administrativo' => 'ROLE_ADMIN'),
                                'multiple' => false,
                                                               
                             ))
                ->add('isActive', CheckboxType::class, array('label' => 'Activar Usuario'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlataformaBundle\Entity\Usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'plataformabundle_usuarios';
    }


}
