<?php
include("connexion_bdd.php");

$ma_requete_SQL = "SELECT ADHERENT.nomAdherent,
  ADHERENT.adresse,
  ADHERENT.datePaiement,
  ADHERENT.idAdherent,
  COUNT(E.idAdherent) as nbrEmprunt,
  IF(CURRENT_DATE()>DATE_ADD(datePaiement, INTERVAL 1 YEAR),1,0) as retard,
  IF(CURRENT_DATE()>DATE_ADD(datePaiement, INTERVAL 11 MONTH),1,0) as retardProche,
  DATE_ADD(datePaiement, INTERVAL 1 YEAR) as datePaiementFutur
FROM ADHERENT
  LEFT JOIN EMPRUNT E ON ADHERENT.idAdherent = E.idAdherent
  AND E.dateRendu IS NULL
GROUP BY ADHERENT.idAdherent
ORDER BY ADHERENT.nomAdherent";

$reponse = $bdd->query($ma_requete_SQL);
$donnees = $reponse->fetchAll();
?>

<div class="row">
    <a href="Adherent_add.php">Ajouter un adherent</a>
    <table border="2">
        <caption>Recapitulatif des Adherents</caption>
        <?php if(isset($donnees[0])):?>
        <thead>
            <tr>
                <th>Nom</th>
                <th>adresse</th>
                <th>date paiement</th>
                <th>id</th>
                <th>Nb Emprunt</th>
                <th>Retard</th>
                <th>RetardProche</th>
                <th>DatePaiementFutur</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donnees as $value):?>
            <tr>
                <td>
                    <?= $value['nomAdherent'] ?>
                </td>
                <td>
                    <?= $value['adresse'] ?>
                </td>
                <td>
                    <?= $value['datePaiement'] ?>
                </td>
                <td>
                    <?= $value['idAdherent'] ?>
                </td>
                <td>
                    <?= $value['nbrEmprunt'] ?>
                </td>
                <td>
                    <?= $value['retard'] ?>
                </td>
                <td>
                    <?= $value['retardProche'] ?>
                </td>
                <td>
                    <?= $value['datePaiementFutur'] ?>
                </td>
                <td>
                    <a href="Adherent_edit.php?id=<?= $value['idAdherent'] ?>">Modifier</a>
                    <a href="Adherent_delete.php?id=<?= $value['idAdherent'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <?php endif; ?>
    </table>
</div>
