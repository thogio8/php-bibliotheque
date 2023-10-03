<?php

namespace App;

class Livre extends Media
{
    private string $isbn;
    private string $auteur;
    private int $nbPages;

    public function __construct(string $isbn, string $auteur, int $nbPages, string $titre, int $dureeEmprunt)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->dureeEmprunt = 21;
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
    }

    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    public function informationsMedia(): string
    {
        return "Le livre écrit par {$this->auteur} qui a pour ISBN {$this->isbn} a {$this->nbPages} pages.";
    }
}