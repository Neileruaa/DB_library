<?php
include 'connexion_bdd.php';

if(isset($_GET["id"]) AND is_numeric($_GET["id"])){
    $id = htmlentities($_GET['id']);
    $ma_requete_SQL=
        "SELECT ad.idAdherent, ad.nomAdherent, ad.adresse, ad.datePaiement
        FROM ADHERENT ad
        WHERE ad.idAdherent=".$id.";";
    $reponse = $bdd ->query($ma_requete_SQL);
    $donnees= $reponse -> fetch();
}

if (isset($_POST["nomAdherent"]) AND
isset($_POST["datePaiement"])AND
isset($_POST["adresse"])AND
isset($_POST["idAdherent"])) {

    $donnees['nomAdherent']=$_POST['nomAdherent'];
    $donnees['datePaiement']=htmlentities($_POST['datePaiement']);
    $donnees['adresse']=htmlentities($_POST['adresse']);
    $donnees['idAdherent']=htmlentities($_POST['idAdherent']);

    $sql =
        "UPDATE ADHERENT SET
          idAdherent='{$donnees['idAdherent']}',
          nomAdherent='{$donnees['nomAdherent']}',
          datePaiement='{$donnees['datePaiement']}',
          adresse = '{$donnees['adresse']}'
          WHERE idAdherent = {$donnees['idAdherent']}";

    $bdd->exec($sql);
    header('Location: Adherent_show.php');
}
?>

<form method="post" action="">
    <div class="row">
        <fieldset>
            <legend>Modifier un adhérent</legend>

            <input name="idAdherent" type="hidden" value="<?php if(isset($donnees['idAdherent']))echo $donnees['idAdherent'] ?>">
            <label>
                Nom de l'adherent :
                <input type="text" name="nomAdherent" size="18" value="<?php if(isset($donnees['nomAdherent']))echo $donnees['nomAdherent'] ?>">
            </label>
            <label>
                Adresse:
                <input type="text" name="adresse" size="18" value="<?php if(isset($donnees['adresse']))echo $donnees['adresse'] ?>">
            </label>
            <label>
                date de paiement
                <input type="date" name="datePaiement" size="18" value="<?php if(isset($donnees['datePaiement']))echo $donnees['datePaiement'] ?>">
            </label>

            <input type="submit" name="ModifierAdherent" value="Modifier adherent">
        </fieldset>
    </div>
</form>
