<?php
    extract($_POST);
    require "connexionBD.php";
    $pdo = connectToDb();

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['email']) 
        && !empty($_POST['num']) && !empty($_POST['adresse']) && !empty($_POST['cp'])
        && !empty($_POST['etab']) && !empty($_POST['niveau'])){

        $civilite = htmlspecialchars($_POST['civilite']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $age = htmlspecialchars($_POST['age']);
        $email = htmlspecialchars($_POST['email']);
        $num = htmlspecialchars($_POST['num']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $cp = htmlspecialchars($_POST['cp']);
        $etab = htmlspecialchars($_POST['etab']);
        $niveau = htmlspecialchars($_POST['niveau']);

        if(preg_match('/^[a-zA-Z]+$/', $_POST['nom'])){    
            if (preg_match('/^[a-zA-Z]+$/', $_POST['prenom'])){
                if (preg_match('/^[0-9]+$/', $_POST['age'])){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if (preg_match('/^[0-9]+$/', $_POST['num'])){
                            if (preg_match('/^[0-9a-zA-Z]+$/', $_POST['adresse'])){
                                if (preg_match('/^[0-9]+$/', $_POST['cp'])){
                                    if (preg_match('/^[a-zA-Z]+$/', $_POST['etab'])){
                                        $insert = $pdo->prepare('INSERT INTO personne(Civilite, Nom, Prenom, Age, Email, Telephone, Adresse, CP, Ecole, Classe) VALUES(:civlite, :nom, :prenom, :age, :email, :telephone, :adresse, :cp, :ecole, :classe)');
                                        $insert->execute(array(
                                            'civlite' => $civilite,
                                            'nom' => $nom,
                                            'prenom' => $prenom,
                                            'age' => $age,
                                            'email' => $email,
                                            'telephone' => $num,
                                            'adresse' => $adresse,
                                            'cp' => $cp,
                                            'ecole' => $etab,
                                            'classe' => $niveau,
                                        ));
                    
                                    }
                
                                }
                            }
        
                        }
                    }
                }
            }
        }

    }

