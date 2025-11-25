<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Salle;
use App\Enigme;
use App\SessionJeu;
use App\BanqueEnigmes;

$nomEquipe = readline("Entrez le nom de votre équipe : ");

$banqueEnigmes = new BanqueEnigmes();

$nombreEnigmes = 3;

$listeEnigme = $banqueEnigmes->selectionnerEnigmesAleatoires($nombreEnigmes);
$salle = new Salle("Salle Proxy");
foreach ($listeEnigme as $enigme) {
    $salle->ajouterEnigme($enigme);
}
$sessionJeu = new SessionJeu($nomEquipe, $salle);

while (!$sessionJeu->estTerminee()) {
    $enigme = $sessionJeu->getEnigmeEnCours();
    $sessionJeu->afficherProgression();
    echo $enigme->getTexte() . "\n";
    $reponseUtilisateur = readline("Votre réponse : ");
    if ($sessionJeu->repondreAEnigme($reponseUtilisateur)) {
        echo "Bonne réponse !\n";
    } else {
        $indice = $enigme->getIndice();
        echo "Mauvaise réponse. Indice : " . $indice . "\n";
    }
}
