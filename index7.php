<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styletp2.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post" action="traitement.php">
    <section>
        <article class="classtext">
            <?php
            require "connexiondb.php";
            $pdo=creerPDO();
            $requette_sql="SELECT * FROM tp2db.article";
            $pdo_statement = $pdo->prepare($requette_sql);
            $pdo_statement->execute([]);
            $ligne=$pdo_statement->fetch();
            echo '<header>';
            echo $ligne['Entete'];
            echo '</header>';
            echo '<p>';
            echo $ligne['Contenu'];
            echo '</p>';
            echo '<footer>';
            echo $ligne['Pied'];
            echo '</footer>';

            ?>

        </article>
        <article class="identPass">
            <p><label for="idIdent">Identifiant : </label></br>
                <input type ="text" name="identifiant" id="idIdent"/></p>
                <input type="hidden" name="personneH">
            <p><label for="idPass">Mot de passe : </label></br><input type ="password" name="password" id="idPass"/></p>

            <p><input type ="submit" name="Connexion" value="Connexion"/></p>
        </article>
    </section>


</form>

</body>
</html>