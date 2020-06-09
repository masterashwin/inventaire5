<?php $this->titre = "Effacer - " . $this->nettoyer($commande['coupon']); ?>

<produit>
    <header>
        <p>
            <h1>
                Effacer?
            </h1>
            <?= $this->nettoyer($commande['date_commander']) ?>, <?= $this->nettoyer($commande['courriel']) ?> (urgent: <?= $this->nettoyer($commande['urgent']) ?>)<br />
            <strong>Coupon: <?= $this->nettoyer($commande['coupon']) ?></strong><br />
            Spécification: <?= $this->nettoyer($commande['specification']) ?><br />
            Quanntité: <?= $this->nettoyer($commande['quantite']) ?>
        </p>
    </header>
</produit>

<form action="AdminCommandes/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($commande['id_commande']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminproduits/lire" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($commande['id_produit']) ?>" />
    <input type="submit" value="Annuler" />
</form>
