<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Commande extends Modele {

    // Renvoie la liste des commandes associés à un produit
    public function getCommandes($idProduit = NULL) {
        if ($idProduit == NULL) {
            $sql = 'SELECT c.id_commande,'
                    . ' c.id_produit,'
                    . ' c.courriel,'
                    . ' c.date_commander,'
                    . ' c.quantite,'
                    . ' c.coupon,'
                    . ' c.specification,'
                    . ' c.urgent,'
                    . ' c.efface,'
                    . ' p.noms as titreProduit'
                    . ' FROM commandes c'
                    . ' INNER JOIN produits p'
                    . ' ON c.id_produit = p.id_produit'
                    . ' ORDER BY id_commande desc';;
        } else {
            $sql = 'SELECT * from commandes'
                    . ' WHERE id_produit = ?'
                    . ' ORDER BY id_commande desc';;
        }
        $commandes = $this->executerRequete($sql, [$idProduit]);
        return $commandes;
    }

    // Renvoie la liste des commandes publics associés à un produit
    public function getCommandesPublics($idProduit = NULL) {
        if ($idProduit == NULL) {
            $sql = 'SELECT c.id_commande,'
                    . ' c.id_produit,'
                    . ' c.courriel,'
                    . ' c.date_commander,'
                    . ' c.quantite,'
                    . ' c.coupon,'
                    . ' c.specification,'
                    . ' c.urgent,'
                    . ' c.efface,'
                    . ' p.noms as titreProduit'
                    . ' FROM commandes c'
                    . ' INNER JOIN produits p'
                    . ' ON c.id_produit = p.id_produit'
                    . ' WHERE c.efface = 0 AND c.urgent = 0'
                    . ' ORDER BY id_commande desc';
        } else {
            $sql = 'SELECT * FROM commandes'
                    . ' WHERE id_produit = ? AND efface = 0 AND urgent = 0'
                    . ' ORDER BY id_commande desc';;
        }
        $commandes = $this->executerRequete($sql, [$idProduit]);
        return $commandes;
    }

// Renvoie un commande spécifique
    public function getCommande($id) {
        $sql = 'SELECT * FROM commandes'
                . ' WHERE id_commande = ?';
        $commande = $this->executerRequete($sql, [$id]);
        if ($commande->rowCount() == 1) {
            return $commande->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun commande ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un commande
    public function deleteCommande($id) {
        $sql = 'UPDATE commandes'
                . ' SET efface = 1'
                . ' WHERE id_commande = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un commande
    public function restoreCommande($id) {
        $sql = 'UPDATE commandes'
                . ' SET efface = 0'
                . ' WHERE id_commande = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un commande associés à un produit
    public function setCommande($commande) {
        $sql = 'INSERT INTO commandes ('
                . 'id_produit,'
                . ' date_commander,'
                . ' quantite,'
                . ' courriel,'
                . ' coupon,'
                . ' specification,'
                . ' urgent)'
                . ' VALUES(?, NOW(), ?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $commande['id_produit'],
            $commande['quantite'],
            $commande['courriel'],
            $commande['coupon'],
            $commande['specification'],
            $commande['urgent']
                ]
        );
        return $result;
    }

}
