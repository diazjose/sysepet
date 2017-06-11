<?php

namespace PlataformaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class Config_inscripcionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', ChoiceType::class, array(
                               'choices' => array('Pre-Inscripcion' => 'Preinscripcion', 'Inscripcion' => 'Inscripcion'),
                                'multiple' => false,
                                'label' => 'Tipo de Configuracion'
                                                               
                             ))
                ->add('cantidad', NumberType::class, array('label' => 'Cantidad de Alumnos'))
                ->add('anio', TextType::class, array('label' => 'Año de Pre-Inscripcion'))
                ->add('fechaIni', DateType::class, array('label' => 'Fecha de Inicio'))
                ->add('fechaFin', DateType::class, array('label' => 'Fecha de Finalizacion'))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlataformaBundle\Entity\Config_inscripcion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'plataformabundle_config_inscripcion';
    }


}
