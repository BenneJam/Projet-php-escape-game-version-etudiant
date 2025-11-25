<?php

namespace App;

class SessionJeu
{
    private string $nomEquipe;
    private Salle $salle;
    private int $indexEnigmeCourante = 0;
    private int $nombreTentatives = 0;

    public function __construct(string $nomEquipe, Salle $salle)
    {
        $this->nomEquipe = $nomEquipe;
        $this->salle = $salle;
    }

    public function getEnigmeEnCours(): ?Enigme
    {
        return $this->salle->getEnigme($this->indexEnigmeCourante);
    }

    public function repondreAEnigme(string $reponseUtilisateur): bool
    {
        $enigme = $this->getEnigmeEnCours();
        if ($enigme === null) {
            throw new \Exception("Aucune énigme en cours.");
        }
        $this->nombreTentatives++;
        if ($enigme->verifierReponse($reponseUtilisateur)) {
            $this->indexEnigmeCourante++;
            return true;
        }
        return false;
    }

    public function estTerminee(): bool
    {
        return $this->indexEnigmeCourante === $this->salle->getNombreEnigmes();
    }

    public function getIndexEnigmeCourante(): int
    {
        return $this->indexEnigmeCourante;
    }

    public function getNombreTentatives(): int
    {
        return $this->nombreTentatives;
    }

    public function afficherProgression(): void
    {
        echo "Énigme " . ($this->indexEnigmeCourante + 1) . " / " . $this->salle->getNombreEnigmes() . "\n";
    }
}
