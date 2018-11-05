<!DOCTYPE html>
<html>
<head>
    <title>connection</title>
    <meta charset="utf-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="STYLE.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body class="hm-gradient" style=" background-image:url('IMG/bg.jpg');background-repeat: no-repeat;background-size: cover;">

<main>

    <!--MDB Forms-->
    <div class="container mt-4">

        <div class="text-center darken-grey-text mb-4">

            <h1 class="font-bold mt-4 mb-3 h5">SE CONNECTER</h1>

        </div>
 
<center><div class="for">
            <!-- Grid column -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Connection</h3>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                 <label for="defaultForm-email">Email</label>
                                <input  type="text" name="email" id="defaultForm-email" class="form-control" required>
                               
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" name="password" id="defaultForm-pass" class="form-control" required>
                                <label for="defaultForm-pass">Mot de pass</label>
                            </div>
                            <div class="text-center">

                                <input class="btn btn-default waves-effect waves-light" type="submit" name="connection" value="Se connecter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--MDB Forms-->
      </div>
   </center>
 </div>
</main>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>



<?php
$objetPdo= new PDO('mysql:host=localhost;dbname=generateur','root','');
$reponse= $objetPdo->prepare('SELECT * FROM user WHERE email = :cc');


// <!--connexion-->

if (isset($_POST['connection'])) {
    $reponse->execute([
        'cc' => $_POST['email']
    ]);
    $req = $reponse->fetch();
    if ($_POST['email'] == $req['email']) {
        if ($_POST['password'] == $req['password']) {
            header('location:affichage.php');
        }
    }

}
?>



</body>
</html>