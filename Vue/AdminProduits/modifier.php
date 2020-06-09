<?php $this->titre = "Inventaire - " . $this->nettoyer($produit['noms']); ?>

<header>
    <h1 id="titreReponses">Modifier un produit de l'utilisateur 1 :</h1>
</header>
<form action="Adminproduits/miseAJour" method="post">
    <h2>Modifier un produit</h2>
    <p>
        <label for="auteur">Nom</label> : <input type="text" name="noms" id="noms" value="<?= $this->nettoyer($produit['noms']) ?>" /> <br />

        <label for="prixChoix">Votre prix</label>
        <select name="prix">
            <option <?php if ($produit['prix'] == 5 ) echo 'selected' ; ?> value="5">5</option>
            <option <?php if ($produit['prix'] == 10 ) echo 'selected' ; ?> value="10">10</option>
            <option <?php if ($produit['prix'] == 15 ) echo 'selected' ; ?> value="15">15</option>
            <option <?php if ($produit['prix'] == 20 ) echo 'selected' ; ?> value="20">20</option>
        </select><br />

        <label for="text">Description du produit</label> : <textarea name="description" id="description"><?= $this->nettoyer($produit['description']) ?></textarea><br />

        <label>Votre stock</label><br>
        <input type="radio" id="oui" name="en_stock" <?php if ($produit['en_stock'] == "oui" ) echo 'checked' ; ?> value="oui">
        <label for="stockInputProduit">Oui</label><br>
        <input type="radio" id="non" name="en_stock" <?php if ($produit['en_stock'] == "non" ) echo 'checked' ; ?> value="non">
        <label for="stockInputProduit">Non</label><br>

        <label for="type">Type</label> : <input type="text" name="type" id="auto" value="<?= $this->nettoyer($produit['type']) ?>" /> <br />
        <input type="hidden" name="id_client" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id_produit" value="<?= $this->nettoyer($produit['id_produit']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
