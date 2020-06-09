<?php $this->titre = "Inventaire - Commandes" ?>

<header>
    <h1 id="titreReponses">Commandes du inventaire :</h1>
</header>
<?php
foreach ($commandes as $commande):
    ?>
<?php if ($commande['efface'] == '0') : ?>
<p><a href="AdminCommandes/confirmer/<?= $this->nettoyer($commande['id_commande']) ?>">
        [Effacer]</a>
    <?= $this->nettoyer($commande['date_commander']) ?>, <?= $this->nettoyer($commande['courriel']) ?> <?= $this->nettoyer($commande['urgent']) ? '(EN PRIVÉ)' : '' ?> <br />
    <strong><?= $this->nettoyer($commande['titreProduit']) ?></strong><br />
    DESCRIPTIN: <?= $this->nettoyer($commande['specification']) ?><br />
    QUANTITE: <?= $this->nettoyer($commande['quantite']) ?><br />
    COUPON: <?= $this->nettoyer($commande['coupon']) ?><br />
    <a href="Adminproduits/lire/<?= $this->nettoyer($commande['id_produit']) ?>">
        [écrit pour l'produit <i><?= $this->nettoyer($commande['titreProduit']) ?></i>]</a></a>
</p>
<?php else : ?>
<p class="efface"><a href="AdminCommandes/retablir/<?= $this->nettoyer($commande['id_commande']) ?>">
        [Rétablir]</a>
    Commande du <?= $this->nettoyer($commande['date_commander']) ?>, par <?= $this->nettoyer($commande['courriel']) ?> <?= $this->nettoyer($commande['urgent']) ? '(EN PRIVÉ)' : '' ?> EFFACÉ!
</p>
<?php endif; ?>
<?php endforeach; ?>
