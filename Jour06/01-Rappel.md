# CRUD avec Symfony (Doctrine)

```php

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

#[ORM\Entity()]
class Fleur{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\column()]
    private ?int $id = null;

    #[ORM\column()]
    private ?string $nom = null;

}

```


1. Ajouter des getter et setter sur l'entité

```php

    <?php

    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM ;

    #[ORM\Entity()]
    class Fleur{

        #[ORM\Id]
        #[ORM\GeneratedValue]
        #[ORM\column()]
        private ?int $id = null;

        #[ORM\column()]
        private ?string $nom = null;

        public function getId()
        {
            return $this->id;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }

    }

```


2. Créer une autre class Repository

```php

<?php

namespace App\Repository;

use App\Entity\Fleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FleurRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry , Fleur::class);
    }

}

```


3. Associer repository à notre entité

```php

<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM ;

#[ORM\Entity(repositoryClass:EtudiantRepository::class)]  // Ajouter l'information repository dans la class entity
class Fleur{
    // .........
}

```


4. Effectuer le CRUD dans des méthodes de nos controlleurs(en utilisant en plus EntityManager)
      1. CRUD :

```php

<?php

namespace App\Controller;

class GestionController extends AbstractController {


    // READ :
    #[Route("/" , name:"page_accueil")]
    public function read (FleurRepository $fleurRepo){
        $fleurRepo->findAll();  // SELECT * FROM fleurs
        return $this->render("front/vue.html.twig" , ["fleurs" => $fleurs]);  // Envoyer les données dans la partie VUE
    }


    // CREATE :
    #[Route("/create" , name:"page_create")]
    public function create (EntityManagerInterface $em){
        $fleur = new Fleur();
        $fleur -> setNom("Rose");

        $em->persist($fleur);
        $em->flush();
    }


    // DELETE :
    #[Route("/delete" , name:"page_delete")]
    public function delete (EntityManagerInterface $em , FleurRepository $fleurRepo){
        $fleur = $fleurrepo -> findOneBy (["id" => 1]);
        
        if(empty($fleur)){
            return new Response ("Aucune fleur trouvée");
        }

        $em->remove($fleur);
        $em->flush();
    }


    // Update :
    #[Route("/update" , name:"page_update")]
    public function update (EntityManagerInterface $em , FleurRepository $fleurRepo){
        $fleur = $fleurrepo -> findOneBy (["id" => 1]);
        
        if(empty($fleur)){
            return new Response ("Aucune fleur trouvée");
        }
        
        $fleur->setNom("Jasmin");

        $em->persist($fleur);
        $em->flush();
    }


    // Update2 :
    #[Route("/update2" , name:"page_update2")]
    public function update (EntityManagerInterface $em , FleurRepository $fleurRepo){
        try{
            $fleur = $fleurrepo -> findOneBy (["id" => 1]);

            $fleur->setNom("Jasmin");
    
            $em->persist($fleur);
            $em->flush();
        }catch(Exception $e){
            return new Response ("Aucune fleur trouvée");
        }        
    }
    
}

```