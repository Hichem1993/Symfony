<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description' , TextareaType::class , [
                'attr' => [
                    "placeholder" => "Ajouter la description",
                    "rows" => 8
                    ]
                ])
            ->add("miniature" , FileType::class, [
                "label" => "Image à la une "
            ])
            ->add('prix', MoneyType::class, [
                'attr' => [
                    "placeholder" => "0,00"
                ]
            ])
            ->add('dt_creation', null, [
                'widget' => 'single_text'
            ])
            ->add('auteur', EntityType::class, [
                'class' => auteur::class,
                'choice_label' => function(Auteur $auteur){
                    return "{$auteur->getPrenom()} {$auteur->getNom()}";
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
