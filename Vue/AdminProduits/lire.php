<?php $this->titre = "Invenatire - " . $this->nettoyer($produit['noms']); ?>
<produit>
    <header>
        <h1 class="titreProduit"><?= $this->nettoyer($produit['noms']) ?></h1>
        <time><?= $this->nettoyer($produit['date_sortie']) ?></time>, par <?= $this->nettoyer($produit['nom']) ?>
        <h3 class="">prix: <?= $this->nettoyer($produit['prix']) ?></h3>
    </header>
    <p>description: <?= $this->nettoyer($produit['description']) ?></p>
    <p>type: <?= $this->nettoyer($produit['type']) ?></p>
    <p>stock: <?= $this->nettoyer($produit['en_stock']) ?></p>
</produit>
<hr />
<header>
    <h1 id="titreReponses">Commande pour <?= $this->nettoyer($produit['noms']) ?> :</h1>
</header>
<?= ($commandes->rowCount() == 0) ? '<p class="message">Pas encore de commandes pour cet produit.</p>' : '' ?>
<?php
foreach ($commandes as $commande):
    ?>
<?php if ($commande['efface'] == '0') : ?>
<?= $this->nettoyer($commande['urgent']) ? '<p class="urgent">' : '<p>'; ?>
<a href="AdminCommandes/confirmer/<?= $this->nettoyer($commande['id_commande']) ?>">
    [Effacer]</a>
<?= $this->nettoyer($commande['date_commander']) ?>, <?= $this->nettoyer($commande['courriel']) ?> <?= $this->nettoyer($commande['urgent']) ? '(EN PRIVÉ)' : '' ?><br />
<strong>coupon: <?= $this->nettoyer($commande['coupon']) ?></strong><br />
spécification: <?= $this->nettoyer($commande['specification']) ?><br />
quantité: <?= $this->nettoyer($commande['quantite']) ?>
</p>
<?php else : ?>
<p class="efface"><a href="AdminCommandes/retablir/<?= $this->nettoyer($commande['id_commande']) ?>">
        [Rétablir]</a>
    Commande du <?= $this->nettoyer($commande['date_commander']) ?>, par <?= $this->nettoyer($commande['courriel']) ?> <?= $this->nettoyer($commande['urgent']) ? '(EN PRIVÉ)' : '' ?> effacé!
</p>
<?php endif; ?>
<?php endforeach; ?>
