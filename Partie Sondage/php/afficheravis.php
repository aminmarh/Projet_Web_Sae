<?php 

    require "connexionBD.php";
    $pdo = connectToDb();

    $avis = $pdo ->prepare('SELECT idAvis, UPPER(Nom) AS NomM, Prenom, Avis FROM avis ORDER BY idAvis DESC');
    $avis ->execute();

    while ($donnees = $avis->fetch()){
        // Ajouter les résultats de la requête à notre tableau $data
        $data[] = array(
            'nom' => $donnees['NomM'],
            'prenom' => $donnees['Prenom'],
            'avis' => $donnees['Avis']
        );
    }

    // Renvoyer le tableau sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($data);
