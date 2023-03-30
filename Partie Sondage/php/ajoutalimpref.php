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

    $alimPref_dej = isset($_POST['alimm_dej']) ? $_POST['alimm_dej'] : [];
    $alimPref_diner = isset($_POST['alimm_diner']) ? $_POST['alimm_diner'] : [];
    



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

        foreach ($alimPref_dej as $alimdej) {
            $insertAlimdej = $pdo->prepare('INSERT INTO alimentprefdej(idAliment, idPersonne) VALUES(:idAliment, :idPersonne)');
            $insertAlimdej->execute(array(
                'idAliment' => $alimdej,
                'idPersonne' => $personneId,
            ));
        }

        foreach ($alimPref_diner as $alimdiner) {
                $insertAlimdiner = $pdo->prepare('INSERT INTO alimentprefdiner(idAliment, idPersonne) VALUES(:idAliment, :idPersonne)');
                $insertAlimdiner->execute(array(
                    'idAliment' => $alimdiner,
                    'idPersonne' => $personneId,
                ));
            }

    echo "Avis enregistrer :)";
                    
