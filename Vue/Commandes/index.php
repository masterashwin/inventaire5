<?php $this->titre = "Inventaire - Commandes" ?>

<header>
    <h1 id="titreReponses">Commandes de l'inventaire :</h1>
</header>
<?php
foreach ($commandes as $commande):
    ?>
<?php 
        ?>
<p><?= $this->nettoyer($commande['date_commander']) ?>, <?= $this->nettoyer($commande['urgent']) ? '(EN PRIVÉ)' : ''?> <br />
    <strong>Coupon: <?= $this->nettoyer($commande['coupon']) ?></strong><br />Spécification :
    <?= $this->nettoyer($commande['specification']) ?><br />
    Quantite: <?= $this->nettoyer($commande['quantite']) ?><br />
    <!-- Vers Adminproduits si utilisateur en session -->
    <a href="<?= ($utilisateur != '') ? 'Admin' : '' ?>Produits/lire/<?= $this->nettoyer($commande['id_produit']) ?>">
        [écrit pour l'produit <i><?= $this->nettoyer($commande['titreProduit']) ?></i>]</a>
</p>
<?php endforeach; ?>
