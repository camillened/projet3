<?php 

class View {

  // Nom du fichier associé à la vue
  private $fichier;
  // Titre de la vue (défini dans le fichier vue)
  private $title;

  public function __construct($action) {
    // Détermination du nom du fichier vue à partir de l'action
    $this->fichier = . $action . "View/view.php";
  }

  // Génère et affiche la vue
  public function generer($data) {
    // Génération de la partie spécifique de la vue
    $content = $this->genererFichier($this->fichier, $data);
    // Génération du gabarit commun utilisant la partie spécifique
    $view = $this->genererFichier('View/template.php',
      array('title' => $this->title, 'content' => $content));
    // Renvoi de la vue au navigateur
    echo $view;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFichier($fichier, $data) {
    if (file_exists($fichier)) {
      // Rend les éléments du tableau $data accessibles dans la vue
      extract($data);
      // Démarrage de la temporisation de sortie
      ob_start();
      // Inclut le fichier vue
      // Son résultat est placé dans le tampon de sortie
      require $fichier;
      // Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
  }
}


//Le constructeur de Vue prend en paramètre une action, qui détermine le fichier vue utilisé. Sa méthode generer() génère d'abord la partie spécifique de la vue afin de définir son titre (attribut $titre) et son contenu (variable locale $contenu). Ensuite, le gabarit est généré en y incluant les éléments spécifiques de la vue. Sa méthode interne genererFichier() encapsule l'utilisation de require et permet en outre de vérifier l'existence du fichier vue à afficher. Elle utilise la fonction extract pour que la vue puisse accéder aux variables PHP requises, rassemblées dans le tableau associatif $donnees.