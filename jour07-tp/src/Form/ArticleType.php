<?php 

namespace App\Form ;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType{

    // Pour Auteur
    public function __construct(private EtudiantRepository $etudiantRepository)
    {
    }

    // Pour Auteur
    private function getEtudiant(): array{
        $etudiants = $this->etudiantRepository->findAll();
        $resultats = [];
        /** @var Etudiant $etudiant */
        foreach($etudiants as $etudiant){
            $nom_complet = $etudiant->getPrenom() . " " . $etudiant->getNom();
            $resultats[$nom_complet] = $nom_complet;
        }
        return $resultats;
    }

    // méthode qui va permettre de créer les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("titre")
                ->add("description", TextareaType::class)
                ->add("auteur", ChoiceType::class, [
                    "choices" => $this->getEtudiant(),
                    "placeholder" => "Choisir un auteur"
                ])
                ->add("duree" , NumberType::class)
                ->add("url_img" , TextType::class, [
                    "data" => "img/article4.jpg"
                ])
                ->add("dt_creation", DateTimeType::class)
                ->add("creer" , SubmitType::class)
        ;
    }
}