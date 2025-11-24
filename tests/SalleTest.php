<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Salle;
use App\Enigme;

$salle = new Salle("Chambre Mystérieuse");

$enigme1 = new Enigme("Quel est le code secret?", "1234", "C'est un nombre à quatre chiffres.");
$enigme2 = new Enigme("Quelle est la couleur du ciel?", "bleu", "Pensez à une journée ensoleillée.");

$salle->ajouterEnigme($enigme1);
$salle->ajouterEnigme($enigme2);

echo "Nombre d'énigmes dans la salle: " . $salle->getNombreEnigmes() . PHP_EOL;

echo $salle->getEnigme(0)->getTexte() . PHP_EOL;
echo $salle->getEnigme(1)->getTexte() . PHP_EOL;
