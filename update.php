<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req=$db->query("SELECT * FROM article");
$req->execute();
$donnees = $req->fetch();
if(!isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=$_GET['id'];
    echo "il faut un identifiant pour modifier";
}
else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<!--formulaire pour la modification des donnees-->
    <form action="in.php" method="post">
    <!-- <div class="mb-3">
    <label for="id" class="form-label">id</label>
    </div> -->
    <div class="mb-12">
    <label for="title" class="form-label">titre</label>
    <input type="text" class="form-control" name="titre" value="<?php echo $donnees['titre'];?>">
    </div>
    <div class="mb-12">
    <label for="contenu" class="form-label">contenu</label>
    <textarea class="form-control" name="contenu" rows="3" ><?php echo $donnees['contenu'];?></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="envoye" >enrergistre les modification</button>
    </div>
</form>
<?php } ?>
<script src="j.js"></script>
</body>
</html>