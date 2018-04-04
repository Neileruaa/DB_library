<?php
include "connexion_bdd.php";
if (isset($_GET["id"])AND is_numeric($_GET["id"])) {
    $id = htmlentities($_GET['id']);

    $ma_requete_SQL = "DELETE FROM OEUVRE.noOeuvre INNER JOIN AUTEUR ON AUTEUR.idAuteur = OEUVRE.idAuteur WHERE OEUVRE.noOeuvre = ".$_GET["id"];
    $reponse = $bdd ->query($ma_requete_SQL);
    $donnees = $reponse -> exec();
}
header("Location: Oeuvre_show.php");

?>