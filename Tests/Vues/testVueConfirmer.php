<?php

require_once 'Framework/Vue.php';
$commande = [
        'id' => '999',
        'id_produit' => '111',
        'date' => '2017-12-31',
        'auteur' => 'auteur Test',
        'urgent' => '1',
        'titre' => 'titre Test',
        'texte' => 'texte Test',
    ];
$vue = new Vue('Confirmer', 'AdminCommandes');
$vue->generer(['commande' => $commande], null);
