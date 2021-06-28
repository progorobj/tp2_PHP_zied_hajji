<?php

    if(isset($_POST['identifiant']) && isset($_POST['password']))
{
    $_unsafeIdent=htmlspecialchars($_POST['identifiant']);
    $_unsafePass=htmlspecialchars($_POST['password']);
}





//il faut changer la requette select * from ... where id=:identifiant
require 'connexiondb.php';
$pdo=creerPDO();

$requette_sql = "SELECT * FROM tp2db.Personne WHERE Identifiant=:id";

$pdo_statement=$pdo->prepare($requette_sql);
$pdo_statement->execute(['id'=>$_unsafeIdent]);

if($pdo_statement->rowCount()===1)
{
    $ligne=$pdo_statement->fetch();
    $hash = $ligne['MotDePasse'];
    $resultat = password_verify($_unsafePass, $hash);

    if($resultat===true)
    {
        header('Location: indexpage2.php');
        session_start();
        session_regenerate_id();
        $_SESSION['id']=$ligne['Identifiant'];
    }
    else
    {
        header('Location: index7.php');
    }

}
else
{
    header('Location: index7.php');
}

