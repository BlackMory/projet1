<?php
session_start();
 $db=new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if(isset($_POST['email'],$_POST['mdp'])){
        $email=htmlspecialchars($_POST['email']); 
        $mdp=htmlspecialchars($_POST['mdp']);
        $mdp=hash('sha256',$mdp);
    $req=$db->query("SELECT * FROM userss WHERE email= '$email' AND mdp='$mdp'");
    $req->execute(array('email' => $email,'mdp' => $mdp));
    $donnees=$req->fetch();
    //print_r($donnees);
    if($donnees!=null && $donnees!=[]  && $donnees!=''){
        $_SESSION['email']=$email;
        header('Location:accueil.php');
    }
    else{
        $message ="l email ou le mot de passe est incorrecte";
    }
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        html,body{
 height: 100%;
}

#cover {
  background: #222 url('i1.jpg') center center no-repeat;
  background-size: cover;
  color: white;
  height: 100%;
  text-align: center;
  display: flex;
  align-items: center;}
  #cover-caption {
  width: 100%;}
  p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
    </style>
</head>
<body>
<section id="cover">
     <div id="cover-caption">
         <div id="container">
             <div class="col-sm-10 col-sm offset-1">
                 <h1 class="display-3">veuillez vous connecter</h1> </div>
                 <div class="info-form">
                 <form action="page2.php" method="POST" class="form-inline">
                 <div class="col-sm-3 col-sm offset-5">
                    <div class="form-group">
                        <label class="sr-only">email</label>
                        <input type="eamil" class="form-control" placeholder="cc@exemple.com" name="email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">mot de passe</label>
                        <input type="password" class="form-control" placeholder="mot de passe" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-success " value="connexion" style="margin-top:29px;">connexion</button>
                    <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
                    <?php if (!empty($message)) { ?>
                        <p class="errorMessage"><?php echo $message; ?></p>
                    <?php } ?>
                </form>
                </div>
                <br>
             </div>
         </div>
     </div>
 </section>
 
</body>
</html>