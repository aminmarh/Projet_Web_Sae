<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name= "viewport" content="width=device-width, initial-scale=1.0">

        <title>Avis</title>

        <link rel="stylesheet" href="../css/style-avis.css">

        <script src="https://kit.fontawesome.com/cf00848303.js" crossorigin="anonymous"></script>	
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <nav>
            <div class="logo">
                <p><span>Avis</spanx/p>
            </div>
            <div class="responsive_menu"></div>
            <ul class="menu">
                <li><a href="sondage.html">SONDAGE</a></li>
                <li><a href="avis.php">AVIS</a></li>
            </ul>
        </nav> 
        <section id="contact">
            <div class="container">
                <div class="title">
                    <h6>Un avis qui vous passe par la tête</h6>
                    <h3>Partagez-le avec les gens</h3>
                </div>
                <form method="post">
                    <input id="nom" type="text" name="nom" placeholder="Entrer votre nom..." value="" required="">
                    <input id="prenom" type="text" name="prenom" placeholder="Entrer votre prenom..." value="" required="">
                    <textarea id="com" name="message" placeholder="Entrer votre message..." value="" required=""></textarea>
                    <button id="submit" type="submit">Envoyer</button>
                </form>
            </div>
        </section>
        <?php
            extract($_POST);
            require "../php/connexionBD.php";
            $pdo = seConnecterBD();

            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['message'])){
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $com = htmlspecialchars($_POST['message']);

                $insert = $pdo->prepare('INSERT INTO avis(Nom, Prenom, Avis) VALUES(:nom, :prenom, :avis)');
                $insert->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'avis' => $com,
                ));
            }

            $avis = $pdo ->prepare('SELECT idAvis, UPPER(Nom) AS NomM, Prenom, Avis FROM avis ORDER BY idAvis DESC');
            $avis ->execute();
        ?>
        <?php while($c = $avis->fetch()) { ?>
            <section id="facts">
                <div class="container">
                    <p><i class="fa-solid fa-quote-left"></i>
                        <?= $c['Avis'] ?>
                    </p>
                    <div class="person">
                        <div>
                            <?= $c['NomM'], " " ,$c['Prenom']?>
                        </div>
                    </div>

                </div>
            </section>
        <?php } ?>
    </body>
</html>
