<?php

/**
 * Front Controller - Point d'entrée de l'application
 * Route les requêtes vers les bons contrôleurs
 */

// Configuration des erreurs pour le développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrage de la session pour les messages
session_start();

// Inclusion du contrôleur des films
require_once __DIR__ . '/../src/controllers/filmController.php';
require_once __DIR__ . '/../src/controllers/genreController.php';

// Récupération de l'action demandée
$action = $_GET['action'] ?? 'index';

// Pour ajouter une nouvelle route il suffit de ... 
$routes = [
    'index' => [
        'fonction' => 'indexFilms',
        'methodes' => ['GET']
    ],
    
    'show' => [
        'fonction' => 'showfilm',
        'methodes' => ['GET']
    ],

    'create' => [
        'fonction' => 'createfilm',
        'methodes' => ['GET', 'POST']
    ],

    'edit' => [
        'fonction' => 'editfilm',
        'methodes' => ['GET', 'POST']
    ],

    'delete' => [
        'fonction' => 'deletefilm',
        'methodes' => ['GET']
    ],

    'search' => [
        'fonction' => 'searchfilm',
        'methodes' => ['GET']
    ],

    'genres' => [
        'fonction' => 'listeGenres',
        'methodes' => ['GET']
    ],
];


if (array_key_exists($action, $routes)) {
    $fonction = $routes[$action]['fonction'];
    $methodesAutorisees = $routes[$action]['methodes'];
    $methodeActuelle = $_SERVER['REQUEST_METHOD'];

    if (!in_array($methodeActuelle, $methodesAutorisees)) {
        // Méthode non autorisée pour cette route
        header("HTTP/1.1 405 Method Not Allowed");
        echo "Méthode $methodeActuelle non autorisée pour cette action. Seulement autorisé pour $methodesAutorisees";
        exit;
    }

    if (function_exists($fonction)) {
        $fonction();
    } else {
        header("Location: index.php?action=index");
        exit;
    }
} else {
    header("Location: index.php?action=index");
    exit;
}


/*if (array_key_exists($action, $routes)){
   $fonction = $routes[$action]['fonction'];
   if (function_exists($fonction)){
   $fonction();
   }else{
    header("Location: index.php?action=index");
    exit;
   }
} else {
    header("Location: index.php?action=index");
    exit;
}*/

// Routage des actions - les contrôleurs gèrent leurs propres paramètres
/*switch ($action) {
    case 'index':
        indexFilms();
        break;

    case 'show':
        showFilm();
        break;

    case 'create':
        createFilm();
        break;

    case 'edit':
        editFilm();
        break;

    case 'delete':
        deleteFilm();
        break;

    case 'search':
        searchFilms();
        break;

    case 'genres':
        listeGenres();
        break;

    default:
        // Action non reconnue, redirection vers l'index
        header("Location: index.php?action=index");
        exit;
}
*/