<?php

namespace App;

class Timer
{
    private int $startTime;
    private int $endTime;

    public function start(): void
    {
        $this->startTime = time();
    }

    public function stop(): void
    {
        $this->endTime = time();
    }

    public function getDuree(): int
    {
        return $this->endTime - $this->startTime;
    }

    public function getDureeFormattee(): string
    {
        $duree = $this->getDuree();
        $minutes = floor($duree / 60);
        $secondes = $duree % 60;
        return sprintf("%02d:%02d", $minutes, $secondes);
    }
}
