<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();

    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $num = $_POST['num'];
    $addresse = $_POST['addresse'];
    $cp = $_POST['cp'];
    $etab = $_POST['etab'];
    $niveau = $_POST['niveau'];

    $alimPref = isset($_POST['alimm']) ? $_POST['alimm'] : [];



    $insert = $pdo->prepare('INSERT INTO personne(Civilite, Nom, Prenom, Age, Email, Telephone, Adresse, CP, Ecole, Classe) VALUES(:civilite, :nom, :prenom, :age, :email, :telephone, :adresse, :cp, :ecole, :classe)');
    $insert->execute(array(
        'civilite' => $civilite,
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
        'email' => $email,
        'telephone' => $num,
        'adresse' => $addresse,
        'cp' => $cp,
        'ecole' => $etab,
        'classe' => $niveau,
    ));

    $personneId = $pdo->lastInsertId();

        foreach ($alimPref as $alim) {
            $insertAlim = $pdo->prepare('INSERT INTO alimentpref(idAliment, idPersonne) VALUES(:idAliment, :idPersonne)');
            $insertAlim->execute(array(
                'idAliment' => $alim,
                'idPersonne' => $personneId,
            ));
        }

    echo "Avis enregistrer :)";
                    
