<?php

namespace App;
require "./vendor/autoload.php";

class Emprunt
{
    private int $numeroEmprunt = 0;
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private ?\DateTime $dateRetourReel;
    private Adherent $adherent;
    private Media $media;

    /**
     * @param Adherent $adherent
     * @param Media $media
     */
    public function __construct(Adherent $adherent, Media $media)
    {
        $this->numeroEmprunt++;
        $this->dateEmprunt = new \DateTime();
        $this->dateRetourEstimee = (new \DateTime())->modify("+{$media->getDureeEmprunt()} days");
        $this->dateRetourReel = null;
        $this->adherent = $adherent;
        $this->media = $media;
    }

    public function infosEmprunt(): string
    {
        return "Emprunt numero {$this->numeroEmprunt} : L'emprunt concerne le media {$this->media->getTitre()}. Le média a été emprunté le {$this->dateEmprunt} et doit être rendu avant le {$this->dateRetourEstimee}";
    }


    public function renduMedia(?string $dateRetourPourTest = null): void  //Ajout d'un paramètre pour pouvoir tester dans le cas ou un media est rendu après la date de retour estimée
    {
        if (isset($dateRetourPourTest)) {
            $this->dateRetourReel = \DateTime::createFromFormat("d/m/Y", $dateRetourPourTest);
        } else {
            $this->dateRetourReel = new \DateTime();
        }
    }

    public function enCours(): bool
    {
        if (isset($this->dateRetourReel)) {
            return false;
        }
        return true;
    }

    public function enAlerte(): bool
    {
        if ($this->enCours() && $this->dateRetourEstimee > new \DateTime()) {
            return true;
        }
        return false;
    }

    public function estDepasse(): bool
    {
        if (!$this->enCours() && $this->dateRetourEstimee < $this->dateRetourReel) {
            return true;
        }
        return false;
    }

    public function getNumeroEmprunt(): int
    {
        return $this->numeroEmprunt;
    }

    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }

    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }

    public function getDateRetourReel(): \DateTime
    {
        return $this->dateRetourReel;
    }

    public function getAdherent(): Adherent
    {
        return $this->adherent;
    }

    public function getMedia(): Media
    {
        return $this->media;
    }


}