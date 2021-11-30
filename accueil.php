<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["email"])){
    header("Location: page2.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
  
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['email']; ?>!</h1>
    <div class="container">
        <form action="in.php" method="post">
            <!-- <div class="mb-3">
            <label for="id" class="form-label">id</label>
            </div> -->
            <input type="hidden" name="id" value="<?php $_SESSION['id'];?>">

            <div class="mb-12">
            <label for="title" class="form-label">titre</label>
            <input type="text" class="form-control" name="titre">
            </div>
            <div class="mb-12">
            <label for="contenu" class="form-label">contenu</label>
            <textarea class="form-control" name="contenu" rows="3"></textarea>
            </div>
            <div class="mb-3">
            <label for="date" class="form-label">DATE</label>
            <input type="date" class="form-control"  name="date">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" >twiter</button>
            </div>
        </form>
    </div>
    
    <a href="logout.php">Déconnexion</a>
    </div>
    <script>

    </script>
  </body>
</html>
 