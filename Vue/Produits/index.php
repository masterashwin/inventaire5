<?php $this->titre = 'Inventaire'; ?>

<?php foreach ($produits as $produit):
    ?>
<produit>
    <header>
        <a href="Produits/lire/<?= $this->nettoyer($produit['id_produit']) ?>">
            <h1 class="titreProduit"><?= $this->nettoyer($produit['noms']) ?></h1>
        </a>
        <strong class="">TYPE: <?= $this->nettoyer($produit['type']) ?></strong><br>
        DESCRIPTION: <?= $this->nettoyer($produit['description']) ?><br>
        PRIX: <?= $this->nettoyer($produit['prix']) ?><br>
        STOCK: <?= $this->nettoyer($produit['en_stock']) ?><br>
        SORTIE: <time><?= $this->nettoyer($produit['date_sortie']) ?></time>
    </header>
</produit>
<hr />
<?php endforeach; ?>
