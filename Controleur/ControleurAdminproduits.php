<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Produit.php';
require_once 'Modele/Commande.php';

class ControleurAdminProduits extends ControleurAdmin {

    private $produit;
    private $commande;

    public function __construct() {
        $this->produit = new Produit();
        $this->commande = new Commande();
    }

// Affiche la liste de tous les produits du blog
    public function index() {
        $produits = $this->produit->getProduits();
        $this->genererVue(['produits' => $produits]);
    }

// Affiche les détails sur un produit
    public function lire() {
        $idProduit = $this->requete->getParametreId("id");
        $produit = $this->produit->getProduit($idProduit);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $commandes = $this->commande->getCommandes($idProduit);
        $this->genererVue(['produit' => $produit, 'commandes' => $commandes, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel produit et retourne à la liste des produits
    public function nouvelProduit() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un produit n'est pas permis en démonstration");
        } else {
            $produit['id_client'] = $this->requete->getParametreId('id_client');
            $produit['noms'] = $this->requete->getParametre('noms');
            $produit['prix'] = $this->requete->getParametre('prix');
            $produit['description'] = $this->requete->getParametre('description');
            $produit['en_stock'] = $this->requete->getParametre('en_stock');
            $produit['type'] = $this->requete->getParametre('type');
            $this->produit->setProduit($produit);
            $this->executerAction('index');
        }
    }

// Modifier un produit existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $produit = $this->produit->getProduit($id);
        $this->genererVue(['produit' => $produit]);
    }

// Enregistre l'produit modifié et retourne à la liste des produits
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un produit n'est pas permis en démonstration");
        } else {
            $produit['id_produit'] = $this->requete->getParametreId('id_produit');
            $produit['id_client'] = $this->requete->getParametreId('id_client');
            $produit['noms'] = $this->requete->getParametre('noms');
            $produit['prix'] = $this->requete->getParametre('prix');
            $produit['description'] = $this->requete->getParametre('description');
            $produit['en_stock'] = $this->requete->getParametre('en_stock');
            
            $produit['type'] = $this->requete->getParametre('type');
            
            $this->produit->updateProduit($produit);
            $this->executerAction('index');
        }
    }
    
    
    
    
    
    
    public function confirmer() {
        
         $id = $this->requete->getParametreId('id');
        $produit = $this->produit->getProduit($id);
        $this->genererVue(['produit' => $produit]);
    }

    public function supprimer() {
        $id = $this->requete->getParametreId("id");

        $produit = $this->produit->getProduit($id);

        $this->produit->deleteProduit($id);

        $this->rediriger('Adminproduits', 'index');
    }

}
