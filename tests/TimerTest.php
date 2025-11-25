<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Timer;

$timer = new Timer();
$timer->start();
// Simuler une attente de 65 secondes
sleep(65);
$timer->stop();

echo "Durée formatée (MM:SS): " . $timer->getDureeFormattee() . PHP_EOL;
