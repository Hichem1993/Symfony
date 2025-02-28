<?php 

namespace App\Form ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType{

    // méthode qui va permettre de créer les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("prenom")
                ->add("nom")
                ->add("age" , NumberType::class)
                ->add("cv" , TextareaType::class)
                ->add("role", ChoiceType::class , [
                    "choices" => [
                        "Admin" => "Admin",
                        "Redacteur" => "Redacteur"
                    ],
                    "placeholder" => "Veuillez choisir un rôle"
                ])
                ->add("creer", SubmitType::class);
    }
}