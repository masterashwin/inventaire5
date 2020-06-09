<?php

require_once 'Modele/Commande.php';

$tstCommande = new Commande;
$commandes = $tstCommande->getCommandes(1);
echo '<h3>Test getCommandes : </h3>';
var_dump($commandes->rowCount());

$commande = $tstCommande->getCommande(5);
echo '<h3>Test getCommande : </h3>';
var_dump($commande);
