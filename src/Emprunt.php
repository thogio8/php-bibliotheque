<?php

namespace App;
require "./vendor/autoload.php";

class Emprunt
{
    private int $numeroEmprunt = 0;
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private \DateTime $dateRetourReel;
    private Adherent $adherent;
    private Media $media;

    /**
     * @param \DateTime $dateEmprunt
     * @param Adherent $adherent
     * @param Media $media
     */
    public function __construct(\DateTime $dateEmprunt, Adherent $adherent, Media $media)
    {
        $this->numeroEmprunt++;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetourEstimee = $dateEmprunt->modify("+{$media->getDureeEmprunt()} days");
        $this->adherent = $adherent;
        $this->media = $media;
    }

    public function infosEmprunt() : string{
        return "Emprunt numero {$this->numeroEmprunt} : L'emprunt concerne le media {$this->media->getTitre()}. Le média a été emprunté le {$this->dateEmprunt} et doit être rendu avant le {$this->dateRetourEstimee}";
    }

    public function enCours() : bool{
        if(!isset($this->dateRetourReel)){
            return true;
        }
        return false;
    }

    public function enAlerte() : bool{
        if($this->enCours() && $this->dateRetourEstimee > new \DateTime()){
            return true;
        }
        return false;
    }

    public function estDepasse() : bool{
        if(!$this->enCours() && $this->dateRetourEstimee > $this->dateRetourReel){
            return true;
        }
        return false;
    }
}