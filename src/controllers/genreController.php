<?php

/**
 * Contrôleur pour la gestion des films
 * Gère les actions CRUD pour les films
 */

require_once __DIR__ . '/../repositories/filmRepository.php';
require_once __DIR__ . '/../repositories/genreRepository.php';

function listeGenres(){
    $genres = getAllGenres();
    $error = getErrorMessage();
    $success = getSuccessMessage();

    if($genres === false){
        $error = "Erreur lors du chargement des genres";
    }
include __DIR__ . '/../../templates/films/genres.php';
}