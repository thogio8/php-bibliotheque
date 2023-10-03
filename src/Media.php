<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected int $dureeEmprunt;

    /**
     * @param string $titre
     * @param int $dureeEmprunt
     */
    public function __construct(string $titre, int $dureeEmprunt)
    {
        $this->titre = $titre;
        $this->dureeEmprunt = $dureeEmprunt;
    }

    abstract public function informationsMedia() : string;

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

}