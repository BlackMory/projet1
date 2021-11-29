<?php

// Initialiser la session
session_start();

$db= new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(isset($_POST['titre'],$_POST['contenu'],$_POST['date'])){
        //insertion des articles dans la base donnee
        $titre=htmlspecialchars($_POST['titre']);
        $contenu=htmlspecialchars($_POST['contenu']);
        $date=htmlspecialchars($_POST['date']);
        $req=$db->prepare("INSERT INTO article(titre,contenu,date_creation,id_user) VALUES('$titre','$contenu','$date')");
        $req->execute($titre,$contenu,$date,);    }
else{
    echo'erreur';
}
header('location:comment.php');