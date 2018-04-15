<?php
include "connexion_bdd.php";

if(isset($_GET["id"]) AND is_numeric($_GET["id"])){
    $id = htmlentities($_GET['id']);
    $ma_requete_SQL=
        "SELECT oe.titre, oe.noOeuvre, oe.idAuteur, oe.dateParution
        FROM OEUVRE oe
        WHERE oe.noOeuvre=".$id.";";
    $reponse = $bdd ->query($ma_requete_SQL);
    $donnees= $reponse -> fetch();

    $sql=
        "SELECT idAuteur,nomAuteur, prenomAuteur FROM AUTEUR;";
    $reponse = $bdd->query($sql);
    $list_Auteur = $reponse->fetchAll();
}


if (isset($_POST["titre"]) AND
    isset($_POST["dateParution"])AND
    isset($_POST["idAuteur"])AND
    isset($_POST["noOeuvre"]) AND
    isset($_POST['ModifierOeuvre'])){

    $donnees['titre']=$_POST['titre'];
    $donnees['dateParution']=htmlentities($_POST['dateParution']);
    $donnees['idAuteur']=htmlentities($_POST['idAuteur']);
    $donnees['noOeuvre']=htmlentities($_POST['noOeuvre']);

    $ma_requete_SQL =
        "UPDATE OEUVRE SET
        titre='".$donnees['titre']."',
        dateParution='".$donnees['dateParution']."',
        idAuteur=".$donnees['idAuteur']."
        WHERE noOeuvre=".$donnees['noOeuvre'].";";
    $bdd->exec($ma_requete_SQL);
    header("Location: Oeuvre_show.php");
}

?>

<form method="post" action="Oeuvre_edit.php">
    <div class="row">
        <fieldset>
            <legend>Modifier une oeuvre</legend>

            <input name="noOeuvre" type="hidden" value="<?php if(isset($donnees['noOeuvre'])) echo $donnees['noOeuvre'];?>">
            <label> Titre
                   <input name="titre" type="text" size="18" value="<?php if(isset($donnees['titre'])) echo $donnees['titre'];?>">
            </label>
            <br><br>
            <label> Date de parution
                <input type="date" name="dateParution" size="18" value="<?php if(isset($donnees['dateParution']))echo $donnees['dateParution']?>">
            </label>
            <br><br>
            <label>Identifiant de l'auteur
                <select name="idAuteur">
                    <?php foreach ($list_Auteur as $Auteur){ ?>
                        <option value="<?= $Auteur['idAuteur'] ?>" ><?=$Auteur['idAuteur']?> : <?=$Auteur['prenomAuteur']?> <?=$Auteur['nomAuteur']?></option>
                    <?php } ?>
                </select>
            </label>
            <br><br>
            <input type="submit" name="ModifierOeuvre" value="Modifier">
        </fieldset>
    </div>
</form>
