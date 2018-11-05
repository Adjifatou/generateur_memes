<!DOCTYPE html>
<html>
<head>
    <title>connection</title>
    <meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="STYLE.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>


<body class="hm-gradient"style=" background-image:url('IMG/bg2.jpg');background-repeat: no-repeat;background-size: cover;">


<main>

    <!--MDB Forms-->
    <div class="container mt-4">

       <!--  <div class="text-center darken-grey-text mb-4">
            <h1 class="font-bold mt-4 mb-3 h5">S'INSCRIRE</h1>

        </div>
 -->


        <!-- Grid column -->
        <!-- Grid column -->
      <center>  <div class="for">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- Form register -->
                    <form method="POST" >
                        <h2 class="text-center font-up font-bold deep-blue-text py-4">Inscription</h2>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="email" name="email" id="orangeForm-name3" class="form-control" required>
                            <label for="orangeForm-name3" >Email</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text fa1"></i>
                            <input type="text" name="username" id="orangeForm-email3" class="form-control" required>
                            <label for="orangeForm-email3">Nom d'utilisateur</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text fa1"></i>
                            <input type="password" name="password" id="orangeForm-pass3" class="form-control" required>
                            <label for="orangeForm-pass3">Mot de pass</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text fa1"></i>
                            <input type="password" name="confpassword" id="orangeForm-pass3" class="form-control" required>
                            <label for="orangeForm-pass3">Confirmation mot de pass</label>
                        </div>
                        <div class="text-center" >
                          <a href="Authentification.php">se connecter</a>
                            <input class="btn btn-default waves-effect waves-light" type="submit" name="inscrire" value="S'inscrire">

                        </div>
                    </form>
                    <!-- Form register -->
                </div>
            </div>
        </div>
        <!-- Grid column -->
    </div>

</div>
</center>

    <!--MDB Forms-->

</main>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>




<?php
//ouverture d'une connexion a la base de donnees CONTACT;

$objetPdo= new PDO('mysql:host=localhost;dbname=generateur','root','');


$reponse= $objetPdo->prepare('INSERT INTO user(email,username,password) VALUES (:email,:username,:password)');

$reponse->bindParam('email',$_POST['email']);
$reponse->bindParam('username',$_POST['username']);
$reponse->bindParam('password',$_POST['password']);




//$insertok=$reponse->execute();





if (isset($_POST['inscrire']))
{
    if ($_POST['password']==$_POST['confpassword']) {
        echo "valide";
        $insertok = $reponse->execute();
        echo 'inscription reussi';
        header('location:Authentification.php');
    }
    elseif ($_POST['password']!=$_POST['confpassword']) {
        echo "invalide password";

    }
}

?>
</body>