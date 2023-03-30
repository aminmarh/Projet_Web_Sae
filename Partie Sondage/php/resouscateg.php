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

    $data = array(); 

    while ($donnees = $reponse->fetch()){
        $data[] = array(
            'id' => $donnees['idSousCategorie'],
            'nom' => $donnees['NomSousCategorie']
        );
    }

    header('Content-Type: application/json');
    echo json_encode($data);
