<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style2.css" type="text/css" >
	<script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<style type="text/css">
		html{
			background-color: #FFF3F3;
			height: 150vh;
		}
		.pub{
			float:center;
			padding: 10px;
			text-align: center;

			/*border: solid;
			min-width:600px ;
			width: 	30%;
			margin-left: 30%;*/
		}
		.pub:hover{
			box-shadow: 0 0 0 px #e5e5e5;
			cursor:pointer;
		}
		.searchbar {
	     margin-left: 15%;
	     padding:15px;
	     border-radius: 10px;
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
		.icon{
		    width: 200px;
		    float: left;
		    height: 70px;
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

	<nav class="topnav"> 
        <div class="icon">
                <h2 class="logo">IMMoB</h2>
            </div>
  
              <a class="active "href="monSite1.html" >Home</a>
              <a href="contactUs.php" >Contact</a>
              
            
          
              

        </nav>  


<?php 

// recherche par type 
include("config.php");
$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");
	
	if (isset($_GET['search0']) AND !empty($_GET['search0'])) {
	$recherche = htmlspecialchars($_GET['search0']);
	$sql=$db->query("SELECT * FROM `immobilier2` WHERE `type` LIKE '%$recherche%'  ORDER BY id DESC ");
	$sql=$db->query("SELECT * FROM `immobilier2` WHERE `transaction` LIKE '%$recherche%'  ORDER BY id DESC ");
 
while($r = mysqli_fetch_array($sql)) { ?>
<div class="pub">
	<img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
	<?php
	echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'],  "<br>" .$r['transaction'] ,"<br><br><br><br>" ;
	?>
   	
 </div><br><br>
<?php
	 			
}
}

	

?>




<?php 

//recherche par transaction
include("config.php");
$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");
	
	if (isset($_GET['search0']) AND !empty($_GET['search0'])) {
	$recherche = htmlspecialchars($_GET['search0']);
	$sql=$db->query("SELECT * FROM `immobilier2` WHERE `transaction` LIKE '%$recherche%' ORDER BY id DESC ");
	
 
while($r = mysqli_fetch_array($sql)) { ?>
<div class="pub">
	<img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
	<?php
	echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'],  "<br>" .$r['transaction'] ,"<br><br><br><br>" ;
	?>
  	
 </div><br><br>
<?php
	 			
}
}

	

?>


<?php 

// recherche par discription
include("config.php");
$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");

	if (isset($_GET['search0']) AND !empty($_GET['search0'])) {
	$recherche = htmlspecialchars($_GET['search0']);
	$sql=$db->query("SELECT * FROM `immobilier2` WHERE `commentaire` LIKE '%$recherche%' ORDER BY id DESC ");
	
 
while($r = mysqli_fetch_array($sql)) {?>

	<div class="pub">
	<img src="<?php echo $r['file_name']; ?>" class="img" alt="" width="50%", height="50%"/><br><br>
	<?php
	echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'],"<br>".$r['prix'],  "<br>" .$r['transaction'] ,  "<br><br><br><br>" ;

	?>
		
    </div> <br><br>
<?php
	 			
}
}

// filtre de recherche 

if (isset($_GET['recherche'])) {
    $type=$_GET['type'];
    $transaction = $_GET['transaction'];
    $prix=$_GET['prix'];
    
       
           $sql1=$db->query("SELECT * FROM `immobilier2` WHERE `type` = '$type' AND  `transaction` = '$transaction' AND `prix`= '$prix' ");

           while($r = mysqli_fetch_array($sql1)) { ?>
        <div class="pub">
            <img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
            <?php
            echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'], "<br>".$r['transaction'],"<br><br><br><br>" ;
            ?>
          
         </div><br><br>
    <?php
                
            }

        
      
    }

	

?>





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




