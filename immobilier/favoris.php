<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style2.css" type="text/css" >
	<script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
	<title>liste des favoris </title>

	<style type="text/css">
		html{
			height: 2000vh;
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
			.alert-seccesse{
			  padding: 20px;
			  background-color: green; /* Red */
			  color: white;
			  margin-bottom: 15px;
			}
			
	</style>
</head>
<body>

<script type="text/javascript">

function verifjs1()
{
return window.confirm('souhaitez-vous vraiment retirer de la liste des favoris  !'); 
}
function verifjs()
{
return window.confirm('souhaitez-vous vraiment vous déconnecter  !'); 
}

</script>

<nav> 
                        
              <a class="active "href="monSite1.html" >Home</a>
              <a href="contactUs.php" >Contact</a>
              <a href="consulter.php" >Immobillier</a>
               <a href="recherche1.php" >Rechercher</a>
              <a href="lgout.php?déconnecter=true" onclick="return verifjs();" >Log out</a>
             

        </nav>


<?php 

include("config.php");
//id user est dans le lien favoris 


if (isset($_GET['id'])) {
	$r=$db->query("SELECT immob_id ,user_id FROM `favorites` WHERE user_id='".$_GET['id']."' ");
	

		while($a1 = $r->fetch_assoc()) {
				$immob_id=$a1['immob_id'];

			$r2 =$db->query("SELECT * FROM immobilier2 WHERE id='".$immob_id."' ");
			
			while ($a = $r2->fetch_assoc()){?>

				<div class="pub">
          
            <div class="image"><img src="<?php echo $a['file_name'] ?>"  width="50%" height="50%"></div><br><br><br>
          		<?=$a['type']?><br>
                <?=$a['surface']?><br>
                <?=$a['lieu']?><br>
                <?=$a['etat']?><br>
                <?=$a['tel']?><br>
                <?=$a['commentaire']?><br>
                <?=$a['prix']?><br>
                <?=$a['transaction']?><br><br><BR><br>

                <a href="?idFAV=<?php echo $a['id']; ?>"  > <button onclick="return verifjs1();">retirer</button></a>	


              </div>
              <?php
			}
			
		}
	

}





	

 /*if(isset($_GET['id'])) {
	$select="SELECT * FROM `favorites` WHERE user_id='".$_GET['id']."' ";
	$result=mysqli_query($db,$select);
	$row= mysqli_fetch_array($result);
	if ($row) {
		$select1="SELECT `immob_id` FROM `favorites` WHERE user_id ='".$_GET['id']."' ";
		$result1=mysqli_query($db,$select1);
		$row1= mysqli_fetch_array($result1);
		if ($row1) {
			$immob_id=$row1['immob_id'];
			$select2="SELECT * FROM immobilier2 WHERE id='".$immob_id."' ";
			$result2=mysqli_query($db,$select2);
			while ($a = $result2->fetch_assoc()){?>

				<div class="pub">
          
            <div class="image"><img src="<?php echo $a['file_name'] ?>"  width="50%" height="50%"></div><br><br><br>
          		<?=$a['type']?><br>
                <?=$a['surface']?><br>
                <?=$a['lieu']?><br>
                <?=$a['etat']?><br>
                <?=$a['tel']?><br>
                <?=$a['commentaire']?><br>
                <?=$a['prix']?><br>
                <?=$a['transaction']?><br><br><BR><br>

                <a href="?idFAV=<?php echo $a['id']; ?>"  > <button onclick="return verifjs1();">retirer</button></a>	


              </div>
              <?php
			}
			
			
			
		}

		


	}
	else{
			echo "<h1>Aucune favoris dans votre liste !</h1>";
		}
	
}
*/

?>

<?php 
// retirer un favoris 
if (isset($_GET['idFAV'])) {

    include("config.php");
    $delete=" DELETE FROM `favorites` WHERE `immob_id`= '".$_GET['idFAV']."' ";
    $result=mysqli_query($db,$delete);
    if ($result) {
        echo '<div class="alert-seccesse" > 
             vous avez retirer une annonce de la liste de favoris  
              </div>';
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