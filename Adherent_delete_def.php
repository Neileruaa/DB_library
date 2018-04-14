<?php
include 'connexion_bdd.php';

if (isset($_GET["id"])AND is_numeric($_GET["id"])){
    $id = htmlentities($_GET['id']);

    $sql = "DELETE FROM ADHERENT WHERE idAdherent =".$id;
    $bdd->exec($sql);
}
header("Location: Adherent_show.php");