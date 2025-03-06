<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null , [
                "data" => empty($options["auteur"]) ? "" : $options["auteur"]->getEmail()
            ])
            ->add('passwordPlainText')
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    'ROLE_ADMIN' => "ROLE_ADMIN",
                    'ROLE_REDACTEUR' => "ROLE_REDACTEUR"
                ],
                "placeholder" => "Choisir un role",  // Le champs du formulaire roles n'est pas associéau propriété dans l'entité
                "data" => empty($options["auteur"]) ? "" :  $options["auteur"]->getRoles()[0]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // 'data_class' => Auteur::class,
            "auteur" => []
        ]);
    }
}
