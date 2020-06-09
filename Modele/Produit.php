<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux produits 
 * 
 * @author André Pilon
 */
class Produit extends Modele {

// Renvoie la liste de tous les produits, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getProduits() {
// $sql = 'select produits.id, titre, sous_titre, utilisateur_id, date, texte, type, nom from produits, utilisateurs'
// . ' where produits.utilisateur_id = utilisateurs.id order by ID desc';
        $sql = 'SELECT p.id_produit,'
                . ' p.noms,'
                . ' p.id_client,'
                . ' p.date_sortie,'
                . ' p.description,'
                . ' p.type,'
                . ' p.prix,'
                . ' p.en_stock,'
                . ' u.nom,'
                . ' u.courriel,'
                . ' u.adresse,'
                . ' u.telephone'
                . ' FROM produits p'
                . ' INNER JOIN 
                utilisateurs u'
                . ' ON p.id_client = u.id'
                . ' ORDER BY id_produit desc';
        $produits = $this->executerRequete($sql);
        return $produits;
    }

// Renvoie la liste de tous les produits, triés par identifiant décroissant
    public function setProduit($produit) {
        $sql = 'INSERT INTO produits ('
                . ' noms,'
                . ' id_client,'
                . ' date_sortie,'
                . ' description,'
                . ' type,'
                . ' prix,'
                . ' en_stock)'
                . ' VALUES(?, ?, NOW(), ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $produit['noms'],
            $produit['id_client'],
            $produit['description'],
            $produit['type'],
            $produit['prix'],
            $produit['en_stock']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un produit avec le nom de l'utilisateur lié
    
    function getProduit($idProduit) {
        $sql = 'SELECT p.id_produit,'
                . ' p.noms,'
                . ' p.id_client,'
                . ' p.date_sortie,'
                . ' p.description,'
                . ' p.type,'
                . ' p.prix,'
                . ' p.en_stock,'
                . ' u.nom,'
                . ' u.courriel,'
                . ' u.adresse,'
                . ' u.telephone'
                . ' FROM produits p'
                . ' INNER JOIN utilisateurs u'
                . ' ON p.id_client = u.id'
                . ' WHERE p.id_produit=?';
        $produit = $this->executerRequete($sql, [$idProduit]);
        if ($produit->rowCount() == 1) {
            return $produit->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun produit ne correspond à l'identifiant '$idProduit'");
        }
    }

// Met à jour un produit
    public function updateProduit($produit) {
        $sql = 'UPDATE produits'
                . ' SET noms = ?,'
                . ' id_client = ?,'
                . ' date_sortie = NOW(),'
                . ' description = ?,'
                . ' type = ?,'
                . ' prix = ?,'
                . ' en_stock = ?'
                . ' WHERE id_produit = ?';
        $result = $this->executerRequete($sql, [
            $produit['noms'],
            $produit['id_client'],
            $produit['description'],
            $produit['type'],
            $produit['prix'],
            $produit['en_stock'],
            $produit['id_produit']
                ]
                                    
        );
        
        
        return $result;
    }
    
    
    
     public function deleteProduit($id) {
        $sql = 'DELETE FROM produits'
                . ' WHERE produits.id_produit = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

}
