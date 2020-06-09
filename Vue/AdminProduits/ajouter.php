<?php $this->titre = "Inventaire - ajouter un produit"; ?>

<header>
    <h1 id="titreReponses">Ajouter un produit au nom de <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Adminproduits/nouvelProduit" method="post">
    <h2>Ajouter un produit</h2>
    <p>
        <label for="noms">Nom</label> : <input type="text" name="noms" id="noms" /> <br />
        <label for="prixChoix">Votre prix</label>
        <select name="prix">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20" selected>20</option>
        </select><br />
        <label for="description">Description du produit</label> : <textarea type="text" name="description" id="description">Écrivez votre description ici</textarea><br />

        <label>Votre stock</label><br>
        <input type="radio" id="oui" name="en_stock" value="oui">
        <label for="stockChoix">Oui</label><br>
        <input type="radio" id="non" name="en_stock" value="non">
        <label for="stockChoix">Non</label><br>

        <label for="type">Type</label> : <input type="text" name="type" id="auto" /> <br />
        <input type="hidden" name="id_client" value="<?= $idUtilisateur ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>
