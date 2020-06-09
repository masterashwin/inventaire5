<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Commande.php';

class ControleurAdminCommandes extends ControleurAdmin {

    private $commande;

    public function __construct() {
        $this->commande = new Commande();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commandes
    public function index() {
        $commandes = $this->commande->getCommandes();
        $this->genererVue(['commandes' => $commandes]);
    }
  
// Confirmer la suppression d'un commande
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commande à l'aide du modèle
        $commande = $this->commande->getCommande($id);
        $this->genererVue(['commande' => $commande]);
    }

// Supprimer un commande
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le commande afin d'obtenir le id de l'produit associé
        $commande = $this->commande->getCommande($id);
        // Supprimer le commande à l'aide du modèle
        $this->commande->deleteCommande($id);
        //Recharger la page pour mettre à jour la liste des commandes associés
        $this->rediriger('Adminproduits', 'lire/' . $commande['id_produit']);
    }

    // Rétablir un commande
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le commande afin d'obtenir le id de l'produit associé
        $commande = $this->commande->getCommande($id);
        // Supprimer le commande à l'aide du modèle
        $this->commande->restoreCommande($id);
        //Recharger la page pour mettre à jour la liste des commandes associés
        $this->rediriger('Adminproduits', 'lire/' . $commande['id_produit']);
    }

}
