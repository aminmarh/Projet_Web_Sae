<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $com = $_POST['com'];

    $insert = $pdo->prepare('INSERT INTO avis(Nom, Prenom, Avis) VALUES(:nom, :prenom, :avis)');
    $insert->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'avis' => $com,
    ));
    
    echo "Merci d'avoir pris le temps pour votre avis sur notre site :)";