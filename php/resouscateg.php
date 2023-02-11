<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();
    $pdo->exec('SET NAMES utf8');

    $idcatege = $_POST['idcatege'];

    $reponse = $pdo->prepare('SELECT * FROM souscategorie WHERE idCategorie = :idcateg');
    $reponse->execute(array(
        'idcateg' => $idcatege,
    ));

    $data = array(); // Initialiser un tableau vide

    while ($donnees = $reponse->fetch()){
        // Ajouter les résultats de la requête à notre tableau $data
        $data[] = array(
            'id' => $donnees['idSousCategorie'],
            'nom' => $donnees['NomSousCategorie']
        );
    }

    // Renvoyer le tableau sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($data);
