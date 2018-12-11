<?php

require 'Modele/Modele.php';

// l'accuil affiche la liste de tous les billets du blog
function accueil() {
  $billets = getBillets();
  require 'View/Accueilview.php';
}

// Affiche les détails sur un billet
function billet($billet_id) {
  $billet = getBillet($billet_id);
  $commentaires = getComments($billet_id);
  require 'View/Billetview.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'View/Erreurview.php';
}