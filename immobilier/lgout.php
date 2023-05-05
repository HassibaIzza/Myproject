<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>

</head>
<body>
   
   <?php   
   				session_start();
                if(isset($_GET['déconnecter']))
                { 
                   if($_GET['déconnecter']==true)
                   {  
                     session_unset();
                     $_SESSION['loggedIn']=false;
                      
                      header("location:connexion.html");
                   }
                }
  

    ?>
 
</body>
</html>