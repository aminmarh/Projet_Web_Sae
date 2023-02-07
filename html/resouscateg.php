<?php
    $reponse = $pdo->prepare('SELECT * FROM souscategorie WHERE idCategorie = :idcateg');
    $reponse->execute(array(
        'idcateg' => $idcateg,
    ));
    while ($donnees = $reponse->fetch())
    {
    ?>
        <option name="souscateg" value="<?php echo $donnees['idSousCategorie']; ?>"> <?php echo $donnees['NomSousCategorie']; ?></option>
    <?php
    }
