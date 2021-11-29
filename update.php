<?php
session_start();
include "data.php";
if(!isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=$_GET['id'];
    echo "il faut un identifiant pour modifier";
}
$req=$db->prepare('SELECT * FROM article where id=$id');
$req-execute(array($id));
$donnees=$req->fetchAll();?>
<div class="container">
        <form action="post_update.php" method="post">
             <div class="mb-3">
            <label for="id" class="form-label">identifier l utilisateur</label>
            </div>
            <input type="hidden" class="form-control" name="id"id="name" value="<?php $_SESSION['id'];?>">

            <div class="mb-12">
            <label for="title" class="form-label">titre</label>
            <input type="text" class="form-control" name="titre" <?php echo $donnees['titre'];?>>
            </div>
            <div class="mb-12">
            <label for="contenu" class="form-label">contenu</label>
            <textarea class="form-control" name="contenu" rows="3" <?php echo $donnees['contenu'];?>></textarea>
            </div>
            <div class="mb-3">
            <label for="date" class="form-label">DATE</label>
            <input type="date" class="form-control"  name="date" <?php echo $donnees['date'];?>>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" >twiter</button>
            </div>
        </form>
    </div> 
    ``