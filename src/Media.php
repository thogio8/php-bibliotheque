<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected int $dureeEmprunt;

    /**
     * @param string $titre
     */
    public function __construct(string $titre)
    {
        $this->titre = $titre;
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