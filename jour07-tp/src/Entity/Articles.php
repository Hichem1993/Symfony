<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM ;

#[ORM\Entity(repositoryClass:ArticlesRepository::class)]
class Articles{

    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length:255)]
    private ?string $titre = null;

    #[ORM\Column(length:255)]
    private ?string $url_img = null;

    #[ORM\Column(type:"text")]
    private ?string $description = null;

    #[ORM\Column(options:["default" => 1 , "unsigned" => true])]
    private ?string $duree = null;

    #[ORM\Column(length:255)]
    private ?string $auteur = null;

    #[ORM\Column()]
    private ?\DateTime $dt_creation = null;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of url_img
     */ 
    public function getUrl_img()
    {
        return $this->url_img;
    }

    /**
     * Set the value of url_img
     *
     * @return  self
     */ 
    public function setUrl_img($url_img)
    {
        $this->url_img = $url_img;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of auteur
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of dt_creation
     */ 
    public function getDt_creation()
    {
        return $this->dt_creation;
    }

    /**
     * Set the value of dt_creation
     *
     * @return  self
     */ 
    public function setDt_creation($dt_creation)
    {
        $this->dt_creation = $dt_creation;

        return $this;
    }
}