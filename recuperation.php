<?php 
$db = new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
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
<?php
    $req=$db->prepare('SELECT article.id AS id ,article.titre AS titre,article.contenu AS contenu,article.date_creation AS date,userss.prenom AS prenom,userss.nom AS nom, userss.email AS email
    FROM article LEFT JOIN userss ON article.id_user=userss.id
    ORDER BY article.date_creation  DESC');
    $req->execute();
    while($donnees=$req->fetch()){
?>
   <table class="table caption-top">
  <caption>les articles de <?php echo $donnees['email'];?></caption>
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">Prenom</th>
      <th scope="col">nom</th>
      <th scope="col">titre</th>
      <th scope="col">contenu</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $donnees['id'];?></td>
      <td><?php echo $donnees['prenom'];?></td>
      <td><?php echo $donnees['nom'];?></td>
      <td><?php echo $donnees['titre'];?></td>
      <td><?php echo $donnees['contenu'];?></td></td>
      <td><?php echo $donnees['date'];?></td>
    </tr>
  </tbody>
</table>
    <?php }?>
</body>
</html>