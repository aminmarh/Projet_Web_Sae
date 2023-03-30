<?php
    // extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();

    $reponse = $pdo->prepare('SELECT * FROM admin');
    $reponse->execute();

    $data = array(); // Initialiser un tableau vide

    while ($donnees = $reponse->fetch()){
        // Ajouter les résultats de la requête à notre tableau $data
        $data[] = array(
            'identifiant' => $donnees['Mail'],
            'mdp' => $donnees['Mdp']
        );
    }

    // Renvoyer le tableau sous forme de JSON
    header('Content-Type: application/json');
    echo json_encode($data);
