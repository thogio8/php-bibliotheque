<?php
require_once __DIR__."/../../vendor/autoload.php";
require_once "./tests/utils/couleurs.php";
echo PHP_EOL;
echo GREEN_BACKGROUND.BLACK;
echo "Tests : classe Adherent";
echo RESET;
echo PHP_EOL;

echo "Test : Vérification de la création de date si non précisée \n";
//Arrange
$adherent1 = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com");
//Assertion
if($adherent1->getDateAdhesion()->format('d/m/Y') === (new DateTime())->format('d/m/Y')){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : Vérification de la création de date si précisée \n";
//Arrange
$dateAdhesion = "08/11/2022";
$adherent2 = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", $dateAdhesion);
//Assertion
if($adherent2->getDateAdhesion()->format('d/m/Y') === $dateAdhesion){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : Vérification du nombre de caractères du numéro généré \n";
//Arrange
$adherent3 = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", "08/11/2022");
//Assertion
if(strlen($adherent3->getNumeroAdherent()) === 9){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : Vérifier que la chaine commence par 'AD-'\n";
//Arrange
$adherent4 = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", "08/11/2022");
//Assertion
if(substr($adherent4->getNumeroAdherent(),0,3)){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}

echo "Test : Vérifier que la partie numerique est composé uniquement de chiffres \n";
//Arrange
$adherent5 = new \App\Adherent("Thomas", "Gioana", "thomas.gioana@gmail.com", "08/11/2022");
//Assertion
if(strspn(substr($adherent5->getNumeroAdherent(), 3),"0123456789") !== strlen($adherent5->getNumeroAdherent())){
    echo GREEN."[OK]".RESET.PHP_EOL;
} else {
    echo RED."[NOT OK]".RESET.PHP_EOL;
}