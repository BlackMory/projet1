<?php 
session_start();
$db=new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   if(isset($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['mdp'])){ 
    $prenom=htmlspecialchars($_POST['prenom']);
    $nom=htmlspecialchars($_POST['nom']);
    $email=htmlspecialchars($_POST['email']);
    $mdp=htmlspecialchars($_POST['mdp']);
    //insertion dans la base de donnee
    $req=$db->prepare("INSERT INTO userss(prenom,nom,email,mdp) VALUES ('$prenom','$nom','$email','".hash('sha256', $mdp)."')");
    $req->execute(array($prenom,$nom,$email,$mdp));
    if($req){
        echo "<div class='sucess'>
              <h3>Vous êtes inscrit avec succès.</h3>
              <p>Cliquez ici pour vous <a href='page2.php'>connecter</a></p>
        </div>";
     }
 }else{
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class=card-title>veuillez vous enregistrer</h2>
                </div>
                <div class="card-body">
                    <form action="page1.php" method="POST">
                        <div class="row g-3">
                            <div class="col-6">
                               <input type="text" class="form-control" placeholder="prenom" aria-label="prenom" required name="prenom">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="nom" aria-label="nom" required name="nom">
                            </div>
                         <div class="col-md-6">
                            <input type="email" class="form-control"  placeholder="email" required name="email">
                         </div>
                         <div class="col-md-6">
                            <input type="password" class="form-control"  class="mdp" placeholder="mot de passe" required name="mdp">
                         </div>
                         <div class="col-12">
                            <button type="submit" class="btn btn-primary">s'enregistre</button>
                           <button class="btn btn-primary"><a href="page2.php">Connectez-vous ici</a> <p class="box-register"></p> </button> 
                         </div>
                     </div>
                    <form>
            </div>
        </div>
    </div>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>