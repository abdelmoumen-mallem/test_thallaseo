<?php

namespace Class;


class Game
{
    private array $mosquitosGroup;

    public function __construct()
    {
        $this->mosquitosGroup = [];

        // Quantité élements dans les groupes
        $queenQuantity = 1;
        $soldierQuantity = 5;
        $larvaQuantity = 8;

        // Position élements dans les groupes
        $positionSoldier = 1;
        $positionLarva = 1;

        // Boucle les élements

        for ($i = 0; $i < $queenQuantity; $i++) {
            $this->mosquitosGroup[] = new MosquitoQueen($queenQuantity);
        }

        for ($i = 0; $i < $soldierQuantity; $i++) {
            $this->mosquitosGroup[] = new MosquitoSoldier($positionSoldier++);
        }

        for ($i = 0; $i < $larvaQuantity; $i++) {
            $this->mosquitosGroup[] = new MosquitoLarva($positionLarva++);
        }
    }

    /**
     * Logique du jeu 
     * 
     * attaque aléatoirement un moustique
     * les attaques sont affectés aux moustiques encore vivants
     * quand la reine a 0 point de vie la partie s'arrête  
     * 
     */

    /**
     * function randomMosquito (param -> booléen)
     * TRUE = jeu en cours
     * FALSE = rejouer
     */

    // Récupére les moustisques, avec la logique du jeu qui lui imcombe
    public function randomMosquito($restart): string
    {
        // Initialise la liste des moustiques
        $mosquitosList = '';

        // Attaque un moustique aléatoirement
        $key = array_rand($this->mosquitosGroup);
        $selectedMosquito = $this->mosquitosGroup[$key];

        // Création d'une clé unique pour la session du moustique sélectionné
        $sessionKey = $key . "mosquito";

        // Récupére la vie du moustique depuis la session ou utilise la vie par défaut depuis la classe
        $life = isset($_SESSION[$sessionKey]) && $restart === true ? $_SESSION[$sessionKey] : $selectedMosquito->getLife();

        // Définit la fin du jeu en fonction de la vie de la reine
        $queenLife = isset($_SESSION['0mosquito']) ? $_SESSION['0mosquito'] : $this->mosquitosGroup[0]->getLife();
        if ($queenLife <= 0) {
            header("Location: index.php");
            exit();
        }

        // Vérifie si la vie du moustique est supérieure à zéro
        if ($life > 0) {
            if ($restart === true) {
                // Attaque le moustique et met à jour sa vie dans la session
                $life -= $selectedMosquito->getDamage();
                $_SESSION[$sessionKey] = $life;
            }
        } else {
            // Si la vie du moustique est égale à zéro, nous en recherchons un autre
            $this->randomMosquito(true);
        }

        // Parcourir les moustiques pour récupérer leurs informations
        foreach ($this->mosquitosGroup as $k => $mosquito) {
            // Crée une clé unique pour la session de chaque moustiqye
            $sessionKey = $k . "mosquito";

            // Récupére la vie du moustique depuis la session ou utilise la vie par défaut
            $life = isset($_SESSION[$sessionKey]) && $restart === true ? $_SESSION[$sessionKey] : $mosquito->getLife();

            // Pas de valeur negatives
            $life = max(0, $life);

            // Construit le libellé avec les informations de chaque moustiques
            $mosquitoInfo = sprintf(
                "<li>%s %d, vie : %d</li>",
                $mosquito->getName(),
                $mosquito->getPosition(),
                $life
            );

            // Ajoute les informations du moustique à la liste
            $mosquitosList .= $mosquitoInfo;
        }

        // Retourne cette liste avec leurs informations pour le front
        return $mosquitosList;
    }
}
