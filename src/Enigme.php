<?php

namespace App;

class Enigme
{
    private string $texte;
    private string $reponseAttendue;
    private string $indice;
    private bool $estResolue;

    public function __construct($texte, $reponseAttendue, $indice, $estResolue = false)
    {
        $this->texte = $texte;
        $this->reponseAttendue = $reponseAttendue;
        $this->indice = $indice;
        $this->estResolue = $estResolue;
    }

    public function verifierReponse(string $reponseUtilisateur): bool
    {
        if (strtolower(trim($reponseUtilisateur)) === strtolower(trim($this->reponseAttendue))) {
            $this->estResolue = true;
            return true;
        }
        return false;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function getReponseAttendue(): string
    {
        return $this->reponseAttendue;
    }

    public function getIndice(): string
    {
        return $this->indice;
    }

    public function getEstResolue(): bool
    {
        return $this->estResolue;
    }
}
