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
//et une voiture en particulier grâce à son id
