<?php

require 'modele.php';

// l'accuil affiche la liste de tous les billets du blog
function accueil() {
  $billets = getBillets();
  require 'accueilview.php';
}

// Affiche les détails sur un billet
function billet($billet_id) {
  $billet = getBillet($billet_id);
  $commentaires = getCommentss($billet_id);
  require 'billetview.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'erreurview.php';
}