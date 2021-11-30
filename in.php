<?php

// Initialiser la session
session_start();
$db= new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 if(isset($_POST['titre'],$_POST['contenu'],$_POST['date'],$_SESSION['id'])){
         //insertion des articles dans la base donnee
       $titre=htmlspecialchars($_POST['titre']);
         $contenu=htmlspecialchars($_POST['contenu']);
         $id=$_SESSION['id'];
         $date=date("Y-m-d H:i:s");
         //var_dump($id);
         $req=$db->prepare("INSERT INTO article(titre,contenu,date_creation,id_user) VALUES('$titre','$contenu','$date','$id')");
      $req->execute();  }
 header('location:comment.php');