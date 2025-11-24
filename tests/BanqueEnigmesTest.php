<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\BanqueEnigmes;
use App\Enigme;

$banque = new BanqueEnigmes();
$select = $banque->selectionnerEnigmesAleatoires(58);
foreach ($select as $enigme) {
    echo $enigme->getTexte() . "\n";
}

