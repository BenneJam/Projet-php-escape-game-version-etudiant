<?php

namespace App;

class Salle
{
    private string $nom;
    private array $enigmes;

    public function __construct(string $nom, array $enigmes = [])
    {
        $this->nom = $nom;
        $this->enigmes = $enigmes;
    }

    public function ajouterEnigme(Enigme $enigme): void
    {
        $this->enigmes[] = $enigme;
    }

    public function getEnigme(int $index): ?Enigme
    {
        return $this->enigmes[$index] ?? null;
    }

    public function getNombreEnigmes(): int
    {
        return count($this->enigmes);
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}
