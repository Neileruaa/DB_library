<?php
include "connexion_bdd.php";

if (isset($_GET["id"])AND is_numeric($_GET["id"])) {
    $id = htmlentities($_GET['id']);

    $ma_requete_SQL = "SELECT * FROM EXEMPLAIRE WHERE noOeuvre =".$id.";";
    $reponse = $bdd ->query($ma_requete_SQL);
    $donnees = $reponse -> fetchAll();

    if(empty($donnees)){
        $ma_requete_SQL ="DELETE FROM OEUVRE WHERE noOeuvre =".$id.";";
        $bdd->exec($ma_requete_SQL);

        header("Location: Oeuvre_show.php");
    }
}
?>


<?php include ("v_head.php");include ("v_nav.php");?>

<div class="container">
    Il existe des enregistrements à supprimer dans la table EXEMPLAIRE avant de supprimer cet OEUVRE

    <ul>
        <?php foreach ($donnees as $value); ?>
        <li>
            Num Exemplaire : <?= $value['noExemplaire'] ?>, etat : <?= $value['etat'] ?>, date achat: <?= $value['dateAchat'] ?>, prix : <?= $value['prix'] ?>, noOeuvre : <?= $value['noOeuvre'] ?>
            <br>
        </li>
    </ul>

    Supprimer définitivement l'oeuvre ?
    <a href="Oeuvre_delete_def.php?id="<?= $_GET['id'] ?>>Supprimer</a>
</div>
