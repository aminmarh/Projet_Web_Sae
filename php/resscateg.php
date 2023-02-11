<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();
    $pdo->exec('SET NAMES utf8');

    $idsouscatege = $_POST['idsouscatege'];

    $reponse = $pdo->prepare('SELECT * FROM soussouscategorie WHERE idSousCategorie = :idcateg');
    $reponse->execute(array(
        'idcateg' => $idsouscatege,
    ));

    $data = array(); // Initialiser un tableau vide

    while ($donnees = $reponse->fetch()){
        // Ajouter les résultats de la requête à notre tableau $data
        $data[] = array(
            'id' => $donnees['idSousSousCategorie'],
            'nom' => $donnees['NomCategorie']
        );
    }

    // Renvoyer le tableau sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($data);
