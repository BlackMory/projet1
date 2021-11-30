<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=conn;charset=utf8','root','root',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(!isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=$_GET['id'];
    $req=$db->prepare("DELETE FROM article WHERE id= $id");
$req->execute();
}
header('location:comment.php');