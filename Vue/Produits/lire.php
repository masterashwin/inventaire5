<?php $this->titre = "Inventaire - " . $this->nettoyer($produit['noms']); ?>

<produit>
    <header>
        <h1 class="titreProduit"><?= $this->nettoyer($produit['noms']) ?></h1>
        <time><?= $this->nettoyer($produit['date_sortie']) ?></time>, par <?= $this->nettoyer($produit['nom']) ?>
        <h3 class="">type: <?= $this->nettoyer($produit['type']) ?></h3>
    </header>
    <p>description: <?= $this->nettoyer($produit['description']) ?></p>
    <p>prix: <?= $this->nettoyer($produit['prix']) ?></p>
    <p>stock: <?= $this->nettoyer($produit['en_stock']) ?></p>
</produit>
<hr />
<header>
    <h1 id="titreReponses">Commandes pour <?= $this->nettoyer($produit['noms']) ?> :</h1>
</header>
<?= ($commandes->rowCount() == 0) ? '<p class="message">Pas encore de commandes pour cet produit.</p>' : '' ?>
<?php
foreach ($commandes as $commande):
    ?>
<p>
    Courriel du client: <?= $this->nettoyer($commande['courriel']) ?><br />
    DATE COMMANDER: <?= $this->nettoyer($commande['date_commander']) ?><br />
    COUPON: <strong><?= $this->nettoyer($commande['coupon']) ?></strong><br />
    SPÉCIFICATION: <?= $this->nettoyer($commande['specification']) ?><br />
    QUANTITÉ: <?= $this->nettoyer($commande['quantite']) ?>

</p>
<?php endforeach; ?>

<form action="Commandes/ajouter" method="post">
    <h2>Ajouter un commande</h2>
    <p>
        <label for="courriel">Votre courriel</label> : <input type="text" name="courriel" id="courriel" />
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?>
        <br />
        <label for="texte">Coupon</label> : <input type="text" name="coupon" id="coupon" /><br />
        <label for="texte">Spécification</label> : <textarea type="text" name="specification" id="specification">Écrivez votre spécification ici</textarea><br />
        <label for="quantite">Quantite</label> : <input type="text" name="quantite" id="quantite" /><br />
        <label for="urgent">Urgent?</label><input type="checkbox" name="urgent" />
        <input type="hidden" name="id_produit" value="<?= $this->nettoyer($produit['id_produit']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>
