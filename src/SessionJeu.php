<?php

namespace App;

class SessionJeu
{
    private string $nomEquipe;
    private Salle $salle;
    private int $indexEnigmeCourante;
    private int $nombreTentatives;

    public function __construct(string $nomEquipe, Salle $salle, int $indexEnigmeCourante = 0, int $nombreTentatives = 0)
    {
        $this->nomEquipe = $nomEquipe;
        $this->salle = $salle;
        $this->indexEnigmeCourante = $indexEnigmeCourante;
        $this->nombreTentatives = $nombreTentatives;
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
        return $enigme->verifierReponse($reponseUtilisateur);
    }

    public function estTerminee(): bool
    {
        return $this->indexEnigmeCourante >= $this->salle->getNombreEnigmes();
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
