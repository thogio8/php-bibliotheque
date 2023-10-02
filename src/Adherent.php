<?php

namespace App;
class Adherent{
    protected string $numeroAdherent;
    protected string $prenom;
    protected string $nom;
    protected string $email;
    protected \DateTime $dateAdhesion;

    /**
     * @param string $prenom
     * @param string $nom
     * @param string $email
     * @param string|null $dateAdhesion
     */
    public function __construct(string $prenom, string $nom, string $email, ?string $dateAdhesion = null)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        if($dateAdhesion !== null) {
            $this->dateAdhesion = \DateTime::createFromFormat("d/m/Y", $dateAdhesion);
        } else {
            $this->dateAdhesion = new \DateTime();
        }
        $this->numeroAdherent = $this->genererNumero();
    }

    protected function genererNumero() : string {
        $numeroAleatoire = rand(0, 999999);
        $numeroAleatoire = str_pad(strval($numeroAleatoire), 6, '0', STR_PAD_LEFT);
        return "AD-".$numeroAleatoire;
    }




    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesion;
    }




}