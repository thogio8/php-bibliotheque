<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected string $dureeEmprunt;

    /**
     * @param string $titre
     * @param string $dureeEmprunt
     */
    public function __construct(string $titre, string $dureeEmprunt)
    {
        $this->titre = $titre;
        $this->dureeEmprunt = $dureeEmprunt;
    }

    abstract public function informationsMedia() : string;

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDureeEmprunt(): string
    {
        return $this->dureeEmprunt;
    }

}