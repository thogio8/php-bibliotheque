<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../utils/couleurs.php";

echo PHP_EOL;
echo GREEN_BACKGROUND.BLACK;
echo "Tests : classe Emprunt";
echo RESET;
echo PHP_EOL;

$adherent = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", "08/11/2020");
$livre = new \App\Livre("979-50-412", "Gioana Thomas", 80, "Autobiographie");
$bluray = new \App\BluRay("Gioana Thomas", "1h20mn", "2020", "Toto");
$magazine = new \App\Magazine(2056, "24/06/2020", "Titi");

echo "Test : vérifier que la date d’emprunt, à la création, est égale à la date du jour \n";
//Arrange
$emprunt = new \App\Emprunt($adherent, $livre);
//Assert
if($emprunt->getDateEmprunt()->format('d/m/Y') === (new DateTime())->format("d/m/Y")){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 21 jours pour l’emprunt d’un livre \n";
//Arrange
$emprunt2 = new \App\Emprunt($adherent, $livre);
//Act
$dateResultat = (new DateTime())->add(new DateInterval("P21D"));
//Assert
if($emprunt2->getDateRetourEstimee()->format('d/m/Y') === ($dateResultat)->format('d/m/Y')){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un blu-ray \n";
//Arrange
$emprunt3 = new \App\Emprunt($adherent, $bluray);
//Act
$dateResultat = (new DateTime())->add(new DateInterval("P15D"));
//Assert
if($emprunt3->getDateRetourEstimee()->format('d/m/Y') === ($dateResultat)->format('d/m/Y')){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine \n";
//Arrange
$emprunt4 = new \App\Emprunt($adherent, $magazine);
//Act
$dateResultat = (new DateTime())->add(new DateInterval("P10D"));
//Assert
if($emprunt4->getDateRetourEstimee()->format('d/m/Y') === ($dateResultat)->format('d/m/Y')){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée \n";
//Arrange
$emprunt5 = new \App\Emprunt($adherent, $livre);
//Assert
if($emprunt5->enCours()){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que l’emprunt est en alerte quand la date de retour estimée est antérieure à la date du jour et que l’emprunt est en cours \n";
//Arrange
$emprunt6 = new \App\Emprunt($adherent, $livre);
//Assert
if($emprunt6->enAlerte()){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée \n";
//Arrange
$emprunt7 = new \App\Emprunt($adherent, $livre);
//Act
$emprunt7->renduMedia("28/10/2050");
//Assert
if($emprunt7->estDepasse()){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}