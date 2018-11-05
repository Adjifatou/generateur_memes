
<?php
//Connexion a la base de donnees
try
{
    $sql=new PDO('mysql:host=localhost;dbname=generateur','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
