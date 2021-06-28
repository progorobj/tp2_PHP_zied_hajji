
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styletp2.css" rel="stylesheet" type="text/css">

</head>
<body>
<section>
    <article class="classtext">
         <form method="post" action="formulaire.php">
            <?php
            require "connexiondb.php";

            $pdo=creerPDO();
            $requette_sql="SELECT * FROM tp2db.article ";
            $pdo_statement = $pdo->prepare($requette_sql);
            $pdo_statement->execute([]);
            $ligne=$pdo_statement->fetch();
            echo '<header>';
            echo $ligne['Entete'];
            echo '</header>';
            echo '<textarea name=txtArea id="idtexte" rows="20" cols="80">'.$ligne['Contenu'];
            echo '</textarea >';
            echo '<p>';
            echo '<input onclick="mafonction()" type="submit" name="soumettre mod" value="Soumettre les modifications"/>';
            echo '<footer>';
            echo $ligne['Pied'];
            echo '</footer>';
            echo '</p>';

            ?>
         </form>
    </article>
    <article class="identPass">
        <form method="post" action="tp2Deconnexion.php">

            <p id="idIdent">
                <?php
                session_start();
                session_regenerate_id();
                $id='';
                if(isset($_SESSION['id']))
                {
                    $id=$_SESSION['id'];
                }
                echo 'Bonjour '.$id;
                ?>
            </p>

            <p>
            <input type ="submit" name="Deconnexion" value="Deconnexion" />
            </p>
        </form>
    </article>
</section>

</body>
</html>
