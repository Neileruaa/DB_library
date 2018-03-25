<?php
include "connexion_bdd.php";

if (isset($_GET["id"])AND is_numeric($_GET["id"])) {
    $id = htmlentities($_GET['id']);
    $ma_requete_SQL =
        "DELETE OEUVRE FROM OEUVRE
INNER JOIN AUTEUR A ON OEUVRE.idAuteur = A.idAuteur
WHERE noOeuvre =".$id.";";

    $bdd->exec($ma_requete_SQL);

    header("Location: Oeuvre_show.php");
}