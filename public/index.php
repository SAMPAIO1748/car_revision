<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

// Creér la bdd car_shop puis l'entité Car
// qui aura les propriétés suivantes :
// name (string, 255, non nullable)
// price (float, non nullable)
// description (text, non nullable)
// reservation (text, nullbale)
// créer la table dans la bdd.

// Créer un CarController.
// Avec les méthodes carList et carShow qui vont afficher la liste des voitures 
// et une voiture en particulier grâce à son id

// Créer la méthode createCar qui va créer une nouvelle voiture dans la bdd 
// mais laissera vide le champs reservation

// Dans la page car_show ajouté un formulaire qui contient juste un textearea et un bouton "Réserver"
// et quand j'appuie sur le bouton la texte qui est dans la texteaera s'enrigistre dans la colonne
// réservation de la voiture
