<?php
include("connexion_bdd.php");

$ma_requete_SQL = "SELECT oe.titre, 
oe.noOeuvre, 
oe.idAuteur, 
oe.dateParution
FROM OEUVRE oe
ORDER BY oe.titre";

/*SELECT ADHERENT.nomAdherent, ADHERENT.adresse, ADHERENT.datePaiement,
COUNT(DISTINCT E.idAdherent)
FROM ADHERENT
LEFT JOIN EMPRUNT E ON ADHERENT.idAdherent = E.idAdherent
GROUP BY ADHERENT.nomAdherent, ADHERENT.adresse,ADHERENT.datePaiement;
*/
