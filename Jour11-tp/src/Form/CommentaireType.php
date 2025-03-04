<?php

namespace App\Form;

use App\Entity\auteur;
use App\Entity\Commentaire;
use App\Entity\recette;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('sujet')
            ->add('message')
            ->add('dt_creation', null, [
                'widget' => 'single_text',
            ])
            ->add('auteur', EntityType::class, [
                'class' => auteur::class,
                'choice_label' => 'id',
            ])
            ->add('recette', EntityType::class, [
                'class' => recette::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
