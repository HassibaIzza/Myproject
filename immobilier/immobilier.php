


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

<?php session_start(); ?>

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
		.btn{
			width: 5%;
			float: center;
			margin-right: 1em;
			margin-left: auto;
			margin-top: -1em;
			height: 30px;
			font-size: 1em;
			color: #fefefe;
			background: #000;
		}
		.btn:hover{
			background-color:#DCDCDC ;
			 color: #75b1d1;
		}
</style>

<script type="text/javascript">

function ask() {
  return window.confirm(" voulez-vous vraiment suppeimer cette annonce  !"); 
}
                        

                      

          

</script>

<nav> 
    				
		         <a class="active "href="monSite1.html">Home</a>
		         <a href="contactUs.php">Contact</a>
		         <a href="consulter.php">Immobiliers</a>
		          <a href="recherche1.php" >Rechercher</a>
		         <a href="favoris.php?id=<?= $_SESSION['id'];?>">Favorites</a>
		         
  					</div>
		         
		              
	</nav>

<?php 
  
    if (isset($_GET['username'])) {
      
    
  include("config.php");
  $articles =$db->query( "SELECT * FROM `immobilier2` WHERE  `immobilier2`.`user`= '".$_GET['username']."' ");
   
        while ($a = $articles->fetch_assoc()){?>
          <div class="pub">
          
            <div class="image"><img src="<?php echo $a['file_name'] ?>"  width="50%" height="50%"></div><br><br><br>
          <?=$a['type']?><br>
                <?=$a['surface']?><br>
                <?=$a['lieu']?><br>
                <?=$a['etat']?><br>
                <?=$a['tel']?><br>
                <?=$a['commentaire']?><br>
                <?=$a['prix']?><br>
                <?=$a['transaction']?><br><br>

                <a href="modifierSupp.php?id=<?php echo $a['id']; ?>"  ><img src="edit.jpg"></a>
               <a href="delete.php?id=<?php echo $a['id']; ?>"onclick="return ask();"><img src="delete.png"></font></a>

              </div>


      <?PHP   }
      	      
     } ?>



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