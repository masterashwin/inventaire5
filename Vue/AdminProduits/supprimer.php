<?php $this->titre = "Effacer - " . $this->nettoyer($produit['nom']); ?>

<produit>
    <header>
        <p>
            <h1>
                Effacer?
            </h1>
            <h2 class="titreProduit"><?= $this->nettoyer($produit['noms']) ?></h2>
            <strong class="">TYPE: <?= $this->nettoyer($produit['type']) ?></strong><br>
            DESCRIPTION: <?= $this->nettoyer($produit['description']) ?><br>
            PRIX: <?= $this->nettoyer($produit['prix']) ?><br>
            STOCK: <?= $this->nettoyer($produit['en_stock']) ?><br>
            <time><?= $this->nettoyer($produit['date_sortie']) ?></time><br>
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
