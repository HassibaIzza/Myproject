<?php 
include("config.php");
if(isset($_GET['id'])) {
    
    $rqt="DELETE  FROM `immobilier2` WHERE `id`= '".$_GET['id']."' ";
    mysqli_query($db,$rqt);
    echo "<h1>Vous avez supprimer une fiche !</h1>";
}

/*if (isset($_GET['id'])) {
    $query="DELETE FROM `users` WHERE `id`= '".$_GET['id']."' ";
    $result=mysqli_query($db,$query);
    if ($result) {
       echo " votre compte est supprimer !";
    }
   
}*/

?>

