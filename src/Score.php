<?php

namespace App;

class Score
{
    private int $tentatives;
    private int $duree;
    private int $nbEnigmes;
    private int $valeur;
    private string $commentaire;

    public function __construct(int $tentatives, int $duree, int $nbEnigmes)
    {
        $this->tentatives = $tentatives;
        $this->duree = $duree;
        $this->nbEnigmes = $nbEnigmes;

        $this->calculerScore();
        $this->genererCommentaire();
    }

    private function calculerScore(): void
    {
        // Barème proposé :
        // - Score de base : 100 points
        // - Malus : 2 points par tentative au‑delà du nombre d’énigmes
        // - Malus temps : 1 point par tranche de 20 secondes
        $malusTentatives = max(0, $this->tentatives - $this->nbEnigmes) * 2;
        $malusTemps = intdiv($this->duree, 20);
        $this->valeur = max(0, 100 - $malusTentatives - $malusTemps);
    }

    private function genererCommentaire(): void
    {
        if ($this->valeur >= 90) {
            $this->commentaire = "C'est un sans faute ! Excellent travail !";
        } elseif ($this->valeur >= 70) {
            $this->commentaire = "Très bon score ! Continue comme ça !";
        } elseif ($this->valeur >= 50) {
            $this->commentaire = "Pas mal. Il y a encore de la marge pour s'améliorer.";
        } else {
            $this->commentaire = "Score faible. Ne vous découragez pas, essayez à nouveau !";
        }
    }

    public function getScore(): int
    {
        return $this->valeur;
    }

    public function getCommentaire(): string
    {
        return $this->commentaire;
    }
}
