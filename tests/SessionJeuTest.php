<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Salle;
use App\Enigme;
use App\SessionJeu;
use App\BanqueEnigmes;

$salle = new Salle('SalleTest');
$session = new SessionJeu('EquipeTest', $salle);
$enigme1 = new Enigme('Quelle est la capitale de la France ?', 'Paris', 'C\'est aussi la ville de l\'amour.');
$enigme2 = new Enigme('Combien font 2 + 2 ?', '4', 'C\'est le nombre de roues d\'une voiture.');

$salle->ajouterEnigme($enigme1);
$salle->ajouterEnigme($enigme2);

// Afficher l'énigme en cours
$enigmeEnCours = $session->getEnigmeEnCours();
echo $enigmeEnCours->getTexte() . "\n";

// Répondre à l'énigme
$reponse = 'Paris';
$session->repondreAEnigme($reponse);
$session->afficherProgression();


// Passer à l'énigme suivante
$session->repondreAEnigme('4');

if ($session->estTerminee()) {
    echo "Le jeu est terminé !\n";
} else {
    echo "Le jeu continue...\n";
}
