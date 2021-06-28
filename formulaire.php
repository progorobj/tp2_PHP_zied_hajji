<?php


if(isset($_POST['txtArea']))
{
    $unsafe_contenu=htmlspecialchars($_POST['txtArea']);

}
if(isset($_GET['hid']))
{
    $unsafe_identifiant=htmlspecialchars($_GET['hid']);
    echo $unsafe_identifiant;
}
require 'connexiondb.php';
$pdo=creerPDO();
$requete_sql="UPDATE tp2db.Article SET Contenu=:contenu";
$pdo_statement = $pdo->prepare($requete_sql);
$resultat = $pdo_statement->execute(['contenu'=>$unsafe_contenu]);

if($resultat===true)
{
    $ligne=$pdo_statement->fetch();
}
global $unsafe_identifiant;

echo $unsafe_identifiant;



    header('Location: indexpage2.php?unsafeid=pberube');




