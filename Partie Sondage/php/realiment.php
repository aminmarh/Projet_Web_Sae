<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();
    $pdo->exec('SET NAMES utf8');

    $idsoussouscatege = $_POST['idsoussouscatege'];

    $reponse = $pdo->prepare('SELECT * FROM aliment WHERE idSousSousCategorie = :idcateg');
    $reponse->execute(array(
        'idcateg' => $idsoussouscatege,
    ));

    $data = array(); // Initialiser un tableau vide

    while ($donnees = $reponse->fetch()){
        // Ajouter les résultats de la requête à notre tableau $data
        $data[] = array(
            'id' => $donnees['idAliment'],
            'nom' => $donnees['NomAliment']
        );
    }

    // Renvoyer le tableau sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($data);
