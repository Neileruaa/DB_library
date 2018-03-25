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
}


if (isset($_POST["titre"]) AND
    isset($_POST["dateParution"])AND
    isset($_POST["idAuteur"])AND
    isset($_POST["noOeuvre"])){
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

    var_dump($ma_requete_SQL);
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
            <label> Date de parution
                <input name="dateParution" type="text" size="18" value="<?php if(isset($donnees['dateParution'])) echo $donnees['dateParution'];?>">
            </label>
            <label>Identifiant de l'auteur
                <input name="idAuteur" type="text" size="18" value="<?php if(isset($donnees['idAuteur'])) echo $donnees['idAuteur'];?>">
            </label>

            <input type="submit" name="ModifierOeuvre" value="Modifier">
        </fieldset>
    </div>
</form>
