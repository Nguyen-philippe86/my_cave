<?php

namespace App\Form;

use App\Entity\Bottles;
use App\Entity\Domaine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year')
            ->add('grapes')
            ->add('description')
            ->add('pictureFile', FileType::class, ['required' => false]) // type de champs dans le formulaire: fichier, input, number, text etc...
            ->add('domaine', EntityType::class, [
                'class' => Domaine::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bottles::class,
        ]);
    }
}
