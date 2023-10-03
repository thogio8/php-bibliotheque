<?php

namespace App;

class Magazine extends Media
{
    private int $numeroMagazine;
    private \DateTime $datePublication;

    public function __construct(int $numeroMagazine, string $datePublication ,string $titre, int $dureeEmprunt)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->dureeEmprunt = 10;
        $this->numeroMagazine = $numeroMagazine;
        $this->datePublication = \DateTime::createFromFormat("d/m/Y", $datePublication);
    }

    public function informationsMedia(): string
    {
        return "Le magazine n°{$this->numeroMagazine} est paru le {$this->datePublication}";
    }

    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

    public function getNumeroMagazine(): int
    {
        return $this->numeroMagazine;
    }

    public function getDatePublication(): \DateTime
    {
        return $this->datePublication;
    }


}