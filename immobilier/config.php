<?php
$sname = "127.0.0.1";
$DB_PORT = "3306";
$uname = "root";
$password = "";
$db_name = "registration";


 
// Connexion à la base de données MySQL 
$db = mysqli_connect($sname ,$uname , $password , $db_name);
 
// Vérifier la connexion
if($db === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
   
}
?>