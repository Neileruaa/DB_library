<?php
include "connexion_bdd.php";

if (isset($_GET["id"])AND is_numeric($_GET["id"])) {
    $id = htmlentities($_GET['id']);

    $ma_requete_SQL = "SELECT * FROM EMPRUNT WHERE idAdherent=".$id.";";
    $reponse = $bdd ->query($ma_requete_SQL);
    $donnees = $reponse -> fetchAll();

    if(empty($donnees)){
        $ma_requete_SQL ="DELETE FROM ADHERENT WHERE idAdherent =".$id.";";
        $bdd->exec($ma_requete_SQL);

        header("Location: Adherent_show.php");
    }
}
include 'v_head.php';
include "v_nav.php";
?>

<div class="container">
    Il existe des emprunts à supprimer avant de supprimer cet adherent.

    <ul>
        <?php foreach ($donnees as $value){?>
        <li>
            IL FAUT REMPLIR ICI
        </li>
        <?php } ?>
    </ul>

    Supprimer définitivement l'oeuvre ?
    <a href="Adherent_delete_def.php?id=<?= $_GET['id'] ?>">Supprimer</a>
</div>