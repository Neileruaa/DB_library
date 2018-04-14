<?php
include 'connexion_bdd.php';

if(isset($_POST['nomAdherent'])
    AND isset($_POST['adresse'])
    AND isset($_POST['datePaiement'])){
    $donnees['nomAdherent'] = $_POST['nomAdherent'];
    $donnees['adresse'] = $_POST['adresse'];
    $donnees['datePaiement'] = $_POST['datePaiement'];


    $sql =
        "INSERT INTO ADHERENT (nomAdherent, adresse, datePaiement)
          VALUES ('{$donnees['nomAdherent']}','{$donnees['adresse']}','{$donnees['datePaiement']}');";

    $bdd->exec($sql);
    header('Location: Adherent_show.php');
}
?>

<form method="post" action="">
    <div class="row">
        <fieldset>
            <legend>Ajouter un adherent</legend>
            <label>Nom Adherent
                <input name="nomAdherent" type="text" size="18" value="">
                <br><br>
            </label>
            <label>Adresse
                <input name="adresse" type="text" size="18" value="">
                <br><br>
            </label>
            <label>Date de paiement
                <input name="datePaiement" type="date" >
            </label>
            <br><br>
            <input type="submit" name="addAdherent" value="Ajouter adherent">
        </fieldset>
    </div>
</form>
