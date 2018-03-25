<?php
//partie modele
include("connexion_bdd.php");

$ma_requete_SQL = "SELECT oe.titre, 
oe.noOeuvre, 
oe.idAuteur, 
oe.dateParution
FROM OEUVRE oe
ORDER BY oe.titre";

$reponse = $bdd->query($ma_requete_SQL);
$donnees = $reponse->fetchAll();

//partie vue
?>

<div class="row">
    <a href="Oeuvre_add.php">Ajouter une oeuvre</a>
    <table border="2">
        <caption>Recapitulatifs des Oeuvres</caption>
        <?php if(isset($donnees[0])): ?>
        <thead>
            <tr>
                <th>titre de l'oeuvre</th>
                <th>identifiant auteur</th>
                <th>date de parution</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donnees as $value):?>

                <tr>
                    <td>
                        <?= $value['titre'] ?>
                    </td>
                    <td>
                        <?= $value['idAuteur'] ?>
                    </td>
                    <td>
                        <?= $value['dateParution'] ?>
                    </td>
                    <td>
                        <a href="Oeuvre_edit.php?id=<?= $value['noOeuvre'] ?>">Modifier</a>
                        <a href="Oeuvre_delete.php?id=<?= $value['noOeuvre'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <?php else: ?>
            <tr>
                <td> Pas d'oeuvre dans la base de données</td>
            </tr>
        <?php endif; ?>
    </table>
</div>


