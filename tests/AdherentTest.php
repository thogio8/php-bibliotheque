<?php

namespace App\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class AdherentTest extends TestCase
{
    /**
     * @test
     */
    public function CreationDateAdhesion_SiNonPrecisee_EgaleALaDateDuJour(){
        $adherent = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com");
        $this->assertEquals((new \DateTime())->format("d/m/Y"), $adherent->getDateAdhesion()->format("d/m/Y"));
    }

    /**
     * @test
     */
    public function CreationDateAdhesion_SiPrecisee_EgaleALaDatePrecisee(){
        $dateAdhesion = "08/11/2022";
        $adherent = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", $dateAdhesion);
        $this->assertEquals($dateAdhesion, $adherent->getDateAdhesion()->format("d/m/Y"));
    }

    /**
     * @test
     */
    public function NumeroAdherentValide_DoitEtreValide_EgalAuFormatVoulu(){    //AD-999999
        $adherent = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", "08/11/2002");
        $this->assertEquals(9, strlen($adherent->getNumeroAdherent()));
        $this->assertEquals("AD-", str_starts_with($adherent->getNumeroAdherent(), "AD-"));
        $this->assertEquals(6, strspn(substr($adherent->getNumeroAdherent(), 3),"0123456789"));
    }


}