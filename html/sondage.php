<?php
    extract($_POST);
    require "../php/connexionBD.php";
    $pdo = connectToDb();
    $pdo->exec('SET NAMES utf8');
?>


<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name= "viewport" content="width=device-width, initial-scale=1.0">

        <title>Sondage</title>


        <link rel="stylesheet" href="../css/style-sondage.css">

        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <nav>
            <div class="logo">
                <p><span>SONDAGE</spanx/p>
            </div>
            <div class="responsive_menu"></div>
            <ul class="menu">
                <li><a href="sondage.html">SONDAGE</a></li>
                <li><a href="avis.php">AVIS</a></li>
            </ul>
        </nav> 
        <header>
            <h1>Sondage</h1>
            <p>
                Cette enquête est remise à chaque élève. Ce sondage vous permet de voir les aliments préférés de vos élèves. 
                Pour cela, il y a la première partie sur le statut d'étudiant, puis la nourriture préfère au petit déjeuner et les aliments préfèrent au repas du soir.
            </p>
        </header>
        <section id="identite">
            <h1>Les informations personnelles</h1>
            <div class="container">
                <div class="title">
                    <h4>Tous les champs sont obligatoires</h4>
                    <p class="civilite">Civilité
                        <input type="radio" name="civilite" id="civilite_m" value="m" /><label for="civilite_m"><abbr title="Monsieur">M.</abbr></label>
                        <input type="radio" name="civilite" id="civilite_mme" value="mme" /><label for="civilite_mme"><abbr title="Madame">Mme</abbr></label>
                    </p>
                </div>
                <div class="fform">

                    <input type="text" name="nom" placeholder="Nom" id="nom" />

                    <input type="text" name="prenom" placeholder="Prénom" id="prenom"/>

                    <input type="text" name="age" placeholder="Age" id="age" value=""/>
            
                    <input type="text" name="email" placeholder="Email" id="email" value=""/>

                    <input type="text" name="num" placeholder="N° Téléphone" id="num" />

                    <input type="text" name="addrese" placeholder="Adresse" id="addrese" />

                    <input type="text" name="cp" placeholder="Code Postal" id="cp" />

                    <input type="text" name="etab" placeholder="Nom de l'établissement" id="etab" />

                    <select name="niveau" class="niveau_classe">
                        <option value="">Selectionner votre classe</option>
                        <option value="6e">6e</option>
                        <option value="5e">5e</option>
                        <option value="4e">4e</option>
                        <option value="3e">3e</option>
                        <option value="2nd">2nd</option>
                        <option value="1er">1er</option>
                        <option value="Ter">Terminale</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </section>
        <section id="ptitdej">
            <h1>Les aliments préférés au petit déjeuner</h1>
            <div class="container">
                <div class="hea">
                    <input type="submit" id="ajouterali" value="Ajouter un aliment">
                </div>
                <div id="test" class="cate">
                    <div id="cat">
                        <form action="recherchebd.php" method="post"></form>
                        <select name="niveau" class="alm">
                            <option value="">La catégorie de votre aliment</option>
                            <?php
                                $reponse = $pdo->prepare('SELECT * FROM categorie');
                                $reponse->execute();

                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option id="test" name="categ" value="<?php echo $donnees['idCategorie']; ?>"> <?php echo $donnees['NomCategorie']; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <select name="niveau" class="almc">
                            <option value="">La sous catégorie</option>
                
                        </select>
                        <select name="niveau" class="alm">
                            <option value="">L'aliment</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <section id="diner">
            <h1>Les aliments préférés au diner</h1>
            <div class="container">
                <div class="hea">
                    <input type="submit" id="ajouterali1" value="Ajouter un aliment">
                </div>
                <div id="test1" class="cate">
                    <div id="cat1">
                        <select name="niveau" class="alm">
                            <option value="">La catégorie de votre aliment</option>
                            <?php
                                $reponse = $pdo->query('SELECT * FROM categorie');
 
                                while ($donnees = $reponse->fetch())
                                {
                                ?>
                                    <option value="<?php echo $donnees['idCategorie']; ?>"> <?php echo $donnees['NomCategorie']; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                        <select name="niveau" class="alm">
                            <option value="">La sous catégorie</option>
                        </select>
                        <select name="niveau" class="alm">
                            <option value="">L'aliment</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <button>Valider</button>
    </body>
</html>