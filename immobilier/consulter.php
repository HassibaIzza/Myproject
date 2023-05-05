<?php 
session_start();
	include("config.php");
	
	$articles = $db->query('SELECT * FROM `immobilier2` ORDER BY `id` ASC ');
 
	?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style2.css" type="text/css" >
	<script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
	<title> consulter des immobilier</title>

	<style>
		html{
			background-color: #FFF3F3;
		}
		.pub{
			float:center;
			padding: 10px;
			text-align: center;
		}
		.pub:hover{
			box-shadow: 0 0 0 px #e5e5e5;
			cursor:pointer;
		}
		button{
			  width: 15%;
			  float: center;
			  margin-right: 1em;
			  margin-left: auto;
			  margin-top: -1em;
			  height: 30px;
			  font-size: 1em;
			  color: #fefefe;
			  background: #000;
			}
			button:hover{
				background-color:#DCDCDC ;
				 color: #75b1d1;
			}		
	</style>
</head>  
<body>
<script type="text/javascript">

function favoris() {
  alert(" élement ajouter à votre favoris !"); 
}
                        
</script>

<nav> 
                       
              <a class="active "href="monSite1.html" >Home</a>
              <a href="contactUs.php" >Contact</a>
              <a href="consulter.php" >Immobillier</a>
              <a href="favoris.php?id=<?= $_SESSION['id'];?>">Favorites</a>
               <a href="recherche1.php" >Rechercher</a>
              <a href="lgout.php?déconnecter=true" onclick="return verifjs();" >Log out</a>
               

        </nav>




	
	<?php while ($a = $articles->fetch_assoc()) { ?>        
            
             <br/>
             
             <center><div class="pub ">
             	<?php

             	$query = $db->query("SELECT `file_name` FROM immobilier2 ORDER BY `id` DESC");
            	if ($query->num_rows > 0) {
                if ($row = $query->fetch_assoc()) {
                   $imageURL = 'uploads/'.$row["file_name"];
                	}
            	}

             	?>

             	<img src="<?php echo $a['file_name'] ?>" width="50%" height="50%"></div><br><br><br>
             	
             	

             	
                	<?= $a['type'] ?><br>
                	<?= $a['surface'] ?> <br>
               	<?= $a['lieu'] ?> <br>
                	<?= $a['etat'] ?> <br>
                	<?= $a['tel'] ?> <br>
            		<?= $a['commentaire'] ?> <br>
                	<?= $a['prix'] ?> <br>
                	<?= $a['transaction']?><br><br>
               
           	  <a href="insertFavoris.php?id=<?php echo $a['id']; ?>"  ><button >favoris</button></a>	
           </div> </center> 
              <?php }?>




              
           
 <footer>
       <P> Follow us : </P>
      <a target="_blank"  href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    <a target="_blank"  href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
    <a target="_blank" href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a> 
    <a target="_blank" href="https://twitter.com"><i class="fa-brands fa-twitter-square"></i></a> 
        	    	
        	    <p><center>Copyright &copy; 2022 Your Compan</center></p>
        	    	
 </footer>
              


</body>
</html>
