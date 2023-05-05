<?php 
session_start();
include('config.php');

//sélectioner les lignes de la table pour afficher 
  $sql = "SELECT * FROM `users` WHERE `email`='".$_SESSION['username']."' ";
    $result=mysqli_query($db,$sql);
    $row= mysqli_fetch_array($result);

?>




    


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  
 <title>page de compte </title>
  <link rel="stylesheet" href="style2.css" type="text/css" >
  <script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
  <style>
.topnav .search-container {
  float: right;
}
html{
  background-image: linear-gradient(rgba(0, 0, 0, 0.40),rgba(0, 0, 0, 0.40)),url(immobhome.jpg);
  background-size: cover;
  background-position: center;
  height: 100vh;
}
button.outils{
  height: 50px;
  width:500px;
  position: center;
  background-color:  #75b1d1 ;
  border-radius: 50px;
  position: left ;
 }
 .outils:hover{
  color: white;
  background-color: grey;
 }


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 40px;
  margin-left: 50px;
}

.icon{
    width: 200px;
    float: left;
    height: 60px;
}

.logo{
    color: #75b1d1;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
    margin-top: 5px
}
  </style>

  <script type="text/javascript">
  
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  
  


</head>
<body>


<script type="text/javascript">
//<![CDATA[
function verifjs()
{
return window.confirm('souhaitez-vous vraiment vous déconnecter !'); 
}
//]]>
function verifjs1()
{
return window.confirm('souhaitez-vous vraiment supprimer votre compte  !'); 
}
</script>



     <nav> 
          <div class="icon">
                <h2 class="logo">IMMoB</h2>
            </div>
     
              <a class="active "href="monSite1.html" >Home</a>
              <a href="contactUs.php" >Contact</a>
              <a href="consulter.php" >Immobillier</a>
              <a href="favoris.php?id=<?= $_SESSION['id'];?>">Favorites</a>
               <a href="recherche1.php" >Recherher</a>
              <a href="lgout.php?déconnecter=true" onclick="return verifjs();" >Log out</a>
  
            </div>

        </nav>                  
  
  <div id="mySidenav" class="sidenav">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <center><p style="color: white;">informations personnelle:</p></center>
  <a href="" ><?=$row['nom'] ?> <?=$row['prénom']?> </a><br>
  <a href="" ><?=$row['date de naissance'] ?>  </a>
  <a href="" ><?=$row['email'] ?> </a><br>
  <a href="" ><?=$row['sexe'] ?> </a><br>
  <a href="sécurité.php?passmod" >Modifier mot de passe</a>
  <a href="lgout.php?déconnecter=true" onclick="return verifjs();" >Se déconnecter</a>
  <a href="delete.php?id=<?= $row['id'] ;?> " onclick="return verifjs1();" >Supprimer mon compte</a>
  
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

 

  <center><h1>Hello <?= $row['nom'] ?> <?= $row['prénom']?>  </h1></center>

   <div class="compt"><center>
  
   <a href="ajouterFiche.html"><button class="outils"> ajouter une annonce d'immobilier  </button></a><br><br>
   <a href="immobilier.php?username=<?php echo $row['email']; ?>"><button class="outils">Mes annonces </button></a><br><br>
   <!--<a href="modifierSupp.php?modifier"><button class="outils"></button></a><br><br>-->
   <a href="consulter.php"> <button class="outils">explorer </button></a><br><br>
    </center></div>

  <script type="text/javascript">
    document.write("");
  </script>

 


   <footer>
       <P> Follow us : </P>
      <a target="_blank"  href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    <a target="_blank"  href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
    <a target="_blank" href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a> 
    <a target="_blank" href="https://twitter.com"><i class="fa-brands fa-twitter-square"></i></a> 
                
              <p><center>Copyright &copy; 2022 Your Compan</center></p>
                
   </footer>



<?php
  
    
      if (isset($_SESSION['loggedin']) && (time() - $_SESSION['loggedin'] > 1800)) {
        //last request was more than 30 minutes ago
        session_unset();     //unset $_SESSION variable for the run-time
        session_destroy();   //destroy session data in storage
    }

?>