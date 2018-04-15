<?php
include "connexion_bdd.php";
//traitement

$sql=
    "SELECT idAuteur,nomAuteur, prenomAuteur FROM AUTEUR;";
$reponse = $bdd->query($sql);
$list_Auteur = $reponse->fetchAll();

if (isset($_POST["titre"])
    AND isset($_POST["dateParution"])
    AND isset($_POST['idAuteur'])){
    //Controles des données
    $donnees['titre'] = $_POST['titre'];
    $donnees['dateParution'] = htmlentities($_POST['dateParution']);
    $donnees['idAuteur'] = htmlentities($_POST['idAuteur']);

    //acces au modele
    $ma_requete_SQL =
        "INSERT INTO OEUVRE (noOeuvre,titre,dateParution, idAuteur)
     VALUES (NULL,'".$donnees['titre']."','".$donnees['dateParution']."'
     ,".$donnees['idAuteur'].");";
    $bdd->exec($ma_requete_SQL);
    header("Location: Oeuvre_show.php");
}

//affichage de la vue

?>

<form method="post" action="Oeuvre_add.php">
    <div class="row">
        <fieldset>
            <legend>Ajouter une Oeuvre</legend>
            <label>Titre
                <input name="titre" type="text" size="18" value=""/>
            <br><br>
            </label>
            <label>Date de parution
                <input type="date" name="dateParution" size="18">
            </label>
            <br><br>
            <label>identifiant de l'auteur
                <select name="idAuteur">
                    <?php foreach ($list_Auteur as $Auteur){ ?>
                        <option value="<?= $Auteur['idAuteur'] ?>" ><?=$Auteur['idAuteur']?> : <?=$Auteur['prenomAuteur']?> <?=$Auteur['nomAuteur']?></option>
                    <?php } ?>
                </select>
            </label>
            <br><br>
            <input type="submit" name="AddOeuvre" value="Ajouter une oeuvre">
        </fieldset>
    </div>
</form>