<?php 
session_start();
include("config.php");

if (isset($_GET['id']) ) {
	if (!empty($_GET['id'])) {

		$id=$_GET['id'] ;

		if ($_SERVER["REQUEST_METHOD"]== "GET" ) {
			
	$id=htmlspecialchars($_GET['id'] );
	echo $_SESSION['id'] ;
	
	 
	
		
		$insert= ("INSERT INTO `favorites` (`user_id`,`immob_id`) VALUES ('".$_SESSION['id']."','".$id."') ");
			$result=mysqli_query($db,$insert);
			if ($result) {
				?>
            <script language="javascript" type="text/javascript">

              alert(" element ajouter aux favoris !");                      

               history.back();                    

          </script>

          <?php
			}else{
				?>
            <script language="javascript" type="text/javascript">

              alert(" element exite déja dans la liste des favoris !");                      

               history.back();                    

          </script>

          <?php
			}

		
	}
	}
}


?>