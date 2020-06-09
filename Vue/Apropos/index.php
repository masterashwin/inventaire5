<?php $titre = 'Inventaire'; ?>

<ul>
    <li>Ashwin Saravanapavan</li>

    <li>420-4A4 MO Web et Bases de données</li>
    <li>Hiver 2020, Collège Montmorency</li>
</ul>
<h3>Inventaire</h3>
<ul>
    <li>L'application "Inventaire" permet de composer et de
        diffuser des produits et de faire des commande sur un produit.VERSION VRAIMENT SIMPLIFIER.</li>
    <li>La page d'Accueil présente la liste des noms des produits
        avec la date, prix, stock, description et type :</li>
    <ul>
        <li>Cette version n'offre pas encore la gestion des utilisateurs.
            Les utilisateurs doivent être entrées manuellement dans la base de données.<br>
        </li>
        <li>
            Pour fin de démonstration, cette version offre la possibilité de changer de contrôleur d'accueil.<br />
            L'accueil présente alors plutôt la liste de tous les commandes à l'accueil :
            <ul>
                <li>
                    Chaque commande indique alors le nom du produit pour lequel il a été écrit, avec un lien vers cet produit.
                </li>
                <li>
                    Cela peut vous être utile si vous désirez présenter à l'accueil le côté n de la relation 1 à n pour votre application. De plus, la commande peut être mis en urgent.
                </li>
            </ul>
        </li>
        <li>
            <form action="<?= $utilisateur != '' ? 'Admin' : ''; ?>commandes" method="post">
                <input type="submit" value="Changer de controleur d'accueil">
            </form>
        </li>
    </ul>
    <li>Si un utilisateur est en session : </li>
    <ul>
        <li>on retrouve un lien pour créer un nouvel produit :
            <ul>
                <li>
                    Le produit créé est attribué à l'utilisateur en session
                </li>
                <li>
                    La page de création d'un produit offre de spécifier le nom traité par
                    le produit (type) par autocomplétion.<br>(par http seulement ; ne fonctionne pas avec https pour l'instant)
                </li>
            </ul>
        </li>
        <li>
            Les actions pour effacer/rétablir un commande sont affichées ;
        </li>
        <li>
            Les commandes privés sont affichés ;
        </li>
        <li>
            Il n'est plus possible d'ajouter un commande pour un produit.
        </li>
    </ul>
    <li>Les lecteurs de l'inventaire peuvent cliquer sur le titre d'un
        produit pour voir les commande associé à cette produit:<br>
    </li>
    <ul>
        <li>On offre la possibilité de
            laisser un commande sur l'produit ;</li>
        <li>La personne qui veut laisser un commande doit
            s'identifier à l'aide d'un courriel valide :</li>
        <ul>
            <li>Un message est affiché si le courriel est invalide et le
                commande n'est pas enregistré.(Cela sert a rejoindre le client vite.)<br>
            </li>
        </ul>
        <li>On peut spécifier s'il s'agit d'un commande privé destiné
            seulement à l'admistrateur du produit :</li>
        <ul>
            <li>Pour l'instant cette fonctionnalité n'est pas encore
                implantée et tous les commandes sont affichés.</li>
        </ul>
        <li>On peut effacer un commande après confirmation (par l'utilisateur de l'produit dans une prochaine version).</li>
        <li>Un commande effacé peut être rétabli (par l'utilisateur de l'produit dans une prochaine version).</li>
        <li>Un commande ne peut pas être modifié.<br>
        </li>
    </ul>
</ul>
<br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>

            <img src="Contenu/images/monDiagramme.png" alt="" />
            <br />
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
            <a href="http://www.databaseanswers.org/data_models/inventory_and_sales/index.htm">
                <img src="Contenu/images/diagrammeBase.png" alt="" /><br />
                Inventaire et Sale :</a>
        </td>
    </tr>
</table>
