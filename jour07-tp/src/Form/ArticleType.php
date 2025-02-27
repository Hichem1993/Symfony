<?php 

namespace App\Form ;

use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType{

    // méthode qui va permettre de créer les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("titre")
                ->add("description", TextareaType::class)
                ->add("auteur", EntityType::class, [
                    "class" => Etudiant::class,
                    "choise_label" => function(Etudiant $etudiant){
                        return $etudiant->getPrenom() . " " . $etudiant->getNom(); 
                    },
                    "placeholder" => "Choisir un auteur"
                ])
                ->add("duree" , NumberType::class)
                ->add("url_img" , UrlType::class)
                ->add("creer" , SubmitType::class)
        ;
    }
}