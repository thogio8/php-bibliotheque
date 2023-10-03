<?php

namespace App;

class BluRay extends Media
{
    private string $realisateur;
    private string $duree;
    private string $anneeSortie;

    public function __construct(string $realisateur, string $duree, string $anneeSortie, string $titre, int $dureeEmprunt)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->dureeEmprunt = 15;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
    }

    public function informationsMedia(): string
    {
        return "Le film réalisé par {$this->realisateur} sorti en {$this->anneeSortie} dure {$this->duree}";
    }

    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    public function getDuree(): string
    {
        return $this->duree;
    }

    public function getAnneeSortie(): string
    {
        return $this->anneeSortie;
    }


}