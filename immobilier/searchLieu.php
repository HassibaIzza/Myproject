<?php 

include("fiche.php");
include("config.php");
$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");

	if (isset($_GET['search']) AND !empty($_GET['search'])) {
	$recherche = htmlspecialchars($_GET['search']);
	$sql=$db->query("SELECT * FROM `immobilier2` WHERE `lieu` LIKE '%$recherche%' ORDER BY id DESC ");
	
?>
<h3>Résultat de la recherche</h3>
<?PHP  
while($r = mysqli_fetch_array($sql)) {?>

	<div class="pub">
	<img src="<?php echo $r['file_name']; ?>" class="img" alt="" width="50%", height="50%"/><br><br>
	<?php
	echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'],"<br>".$r['prix'],  "<br>" .$r['action'] ,  "<br><br><br><br>" ;
	?>
    </div> <br><br>
<?php
	 			
}
}

	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="search.js"></script>
	<title>recherche</title>






	<style type="text/css">

		
		html{
			background-color: #FFF3F3;
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

input[type=text] {
      width: 30%;
      -webkit-transition: width 0.15s ease-in-out;
      transition: width 0.15s ease-in-out;

   }
 input[type=text]:focus {
     width: 70%;
   }
button.rech {
	height: 50px;
  width:100%;
  position: center;
  background-color: #F0F8FF ;
  
  position: left ;
}





	</style>
</head>
<body>
	

<div >
   <form  method="GET" id="Searchbox">
  <input class="searchbar" onkeyup="" type="text" name="search" placeholder="Search..">
   
   </form>
 </div> 
 


</body>
</html>