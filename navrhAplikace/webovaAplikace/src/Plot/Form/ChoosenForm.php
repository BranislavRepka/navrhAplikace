<?php
namespace Plot\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ChoosenForm extends AbstractType {

    /**
     * Method for building form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('choosenData', ChoiceType::class, [
                'choices'       => $builder->getData()->getChoices(),
                'required'      => false,
                'label'         => 'available functions',
                'placeholder'   => 'show pure data'
            ] )
            ->add('noiseDb', NumberType::class, [
                'label'     => 'noise in dB',
                'required'  => false
            ])
            ->add('movingWindow', NumberType::class,[
                'label'     => 'moving window',
                'required'  => false
            ])

            ->add('submit', SubmitType::class, [
                'label' =>'Potvrdiť'
            ]);
    }
}