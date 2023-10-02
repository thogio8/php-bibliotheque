<?php

namespace App;
class Adherent{
    private string $numeroAdherent;
    private string $prenom;
    private string $nom;
    private string $email;
    private \DateTime $dateAdhesion;

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

    private function genererNumero() : string {
        $numeroAleatoire = rand(0, 999999);
        $numeroAleatoire = str_pad(strval($numeroAleatoire), 6, '0', STR_PAD_LEFT);
        return "AD-".$numeroAleatoire;
    }

    public function renouvelerAdhesion() : void{
        $this->dateAdhesion->add(new \DateInterval("P1Y"));
    }

    public function adhesionValable() : bool {
        if($this->dateAdhesion->add(new \DateInterval("P1Y")) > new \DateTime()){
            return true;
        }
        return false;
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