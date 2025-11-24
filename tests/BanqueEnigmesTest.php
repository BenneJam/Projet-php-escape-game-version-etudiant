<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\BanqueEnigmes;

$banque = new BanqueEnigmes();
$select = $banque->selectionnerEnigmesAleatoires(5);
foreach ($select as $enigme) {
    echo $enigme->getTexte() . "\n";
}
