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
<p>les commmentaires du blog</p>

<?php  session_start(); 
//on fait une selection pour afficher les donnees par date trier 
$db=new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req=$db->query('SELECT article.id,article.titre,article.contenu,article.date_creation,article.id_user,userss.prenom,userss.nom
FROM article LEFT JOIN userss ON article.id_user=userss.id
ORDER BY article.date_creation  DESC');
$req->execute();
$donnees = $req->fetchAll();
//var_dump(count($donnees));exit;
foreach($donnees as $donnee ){
?>
<table class="table">
<thead>
<tr>
  <th scope="col">id</th>
  <th scope="col">title</th>
  <th scope="col">content</th>
  <th scope="col">creation date</th>
  <th scope="col"> action</th>
</tr>
</thead>

<tbody>
<tr>
  <?php //affichage du contenu?>
  <th scope="row"><?php echo htmlspecialchars($donnee['id']);?></th>
  <td><strong>
        <?php echo htmlspecialchars($donnee['titre']);?></strong></td>
  <td><?php echo nl2br(htmlspecialchars($donnee['contenu']));?></td>
  <td><?php echo htmlspecialchars($donnee['date_creation']);?></td>
  <td>
    <button class="btn btn-primary" id="update">modifier</button>
    <button class="btn btn-danger" id="delete">supprimer</button>
  </td>
</tr>

</tbody>

</table>
<?php }
$req->closeCursor();?>
<a href="accueil.php">ajouter un commentaire</a>
<script>
  $(document).ready(function() {
	$.ajax({
		url: "recu.php",
		type: "POST",
		cache: false,
		success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
	$(function () {
</script>
</body>
</html>