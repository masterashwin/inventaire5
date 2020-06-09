<?php $this->titre = "Effacer - " . $this->nettoyer($produit['noms']); ?>

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

<form action="AdminProduits/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($produit['id_produit']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminproduits/index" method="post">

    <input type="submit" value="Annuler" />
</form>
