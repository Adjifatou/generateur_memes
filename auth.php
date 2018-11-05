<!DOCTYPE html>
<html>
<head>
	<title>se connecter</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<form method="POST">
<input type="email" name="email" placeholder="votre email">
<input type="password" name="password" placeholder="votre password">
<input type="submit" name="connecter" value="Se connecter">
</form>

<?php
$objetPdo= new PDO('mysql:host=localhost;dbname=generateur','root','');
$reponse= $objetPdo->prepare('SELECT FROM * user WHERE email=?');

 $reponse->bindParam('email',$_POST['email']);
$reponse= $objetPdo->prepare('SELECT FROM * user WHERE password=?');
 $reponse->bindParam('password',$_POST['password']);
    $insertok = $reponse->execute();
 
?>
</body>
</html>