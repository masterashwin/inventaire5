<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Commande.php';

class ControleurCommandes extends Controleur {

    private $commande;

    public function __construct() {
        $this->commande = new Commande();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les commandes
    public function index() {
        $commandes = $this->commande->getCommandesPublics();
        $this->genererVue(['commandes' => $commandes]);
    }

// Ajoute un commande à un produit
    public function ajouter() {
        $commande['id_produit'] = $this->requete->getParametreId("id_produit");
        $commande['courriel'] = $this->requete->getParametre('courriel');
        $validation_courriel = filter_var($commande['courriel'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            if ($this->requete->getSession()->getAttribut("env") == 'prod') {
                $this->requete->getSession()->setAttribut("message", "Ajouter un commande n'est pas permis en démonstration");
            } else {
                $commande['coupon'] = $this->requete->getParametre('coupon');
                $commande['specification'] = $this->requete->getParametre('specification');
                $commande['quantite'] = $this->requete->getParametre('quantite');
                // Ajuster la valeur de la case à cocher
                $commande['urgent'] = $this->requete->existeParametre('urgent') ? 1 : 0;
                // Ajouter le commande à l'aide du modèle
                $this->commande->setCommande($commande);
            }
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            //Recharger la page pour mettre à jour la liste des commandes associés
            $this->rediriger('Produits', 'lire/' . $commande['id_produit']);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Produits', 'lire/' . $commande['id_produit']);
        }
    }

}
