<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\Reparation;
use App\Entity\TacheReparation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheReparationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('status')
            ->add('dateDebut', null, [
                'widget' => 'single_text',
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text',
            ])
            ->add('employe', EntityType::class, [
                'class' => Employe::class,
                'choice_label' => 'id',
            ])
            ->add('reparation', EntityType::class, [
                'class' => Reparation::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TacheReparation::class,
        ]);
    }
}
