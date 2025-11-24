<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Enigme;

$enigme = new Enigme("Quel est la capitale de la France ?", "Paris", "C'est aussi la ville de l'amour.");

if ($enigme->verifierReponse(" par") == true) {
    echo "Réponse correcte !\n";
} else {
    echo "Réponse incorrecte.\n";
}
