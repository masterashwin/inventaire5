<?php $this->titre = 'Inventaire'; ?>

<a href="Adminproduits/ajouter">
    <h2 class="titreProduit">Ajouter un produit</h2>
</a>
<?php foreach ($produits as $produit):
    ?>
DONNER DE L'UTILISATEUR: <br>ID: <?= $this->nettoyer($produit['id_client']) ?><br>
Courriel: <?= $this->nettoyer($produit['courriel']) ?><br>
Téléphone: <?= $this->nettoyer($produit['telephone']) ?><br>
Adresse: <?= $this->nettoyer($produit['adresse']) ?><br>
<produit>
    <header>
        <a href="Adminproduits/lire/<?= $this->nettoyer($produit['id_produit']) ?>">
            <h1 class="titreProduit"><?= $this->nettoyer($produit['noms']) ?></h1>
        </a>
        <strong class="">TYPE: <?= $this->nettoyer($produit['type']) ?></strong><br>
        DESCRIPTION: <?= $this->nettoyer($produit['description']) ?><br>
        PRIX: <?= $this->nettoyer($produit['prix']) ?><br>
        STOCK: <?= $this->nettoyer($produit['en_stock']) ?><br>
        <time><?= $this->nettoyer($produit['date_sortie']) ?></time><br>


        <a href="Adminproduits/confirmer/<?= $this->nettoyer($produit['id_produit']) ?>"> [supprimer l'produit]</a>

        <a href="Adminproduits/modifier/<?= $this->nettoyer($produit['id_produit']) ?>"> [modifier l'produit]</a>
    </header>
</produit>
<hr />
<?php endforeach; ?>
