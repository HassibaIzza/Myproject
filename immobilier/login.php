<!DOCTYPE html>
<html>
    <head>
        <title> My Account </title>
          <script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="Style2.css">
        <meta charset='utf-8'>
    </head>
    <body>
 
<?php

session_start();
 include("config.php");


 if (isset($_POST['submit'])) {
   
   if (!empty('email') && !empty('pass')) {
    # code...
   $id=$_POST['id'];
   $username = $_POST['mail'];
   $password= $_POST['passw'];
    
  

        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        // username and password sent from Form
        
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $username =mysqli_real_escape_string($db,$_POST['mail']);
        $password =mysqli_real_escape_string($db,$_POST['passw']);
        $passwordSecure=md5($password);

        
        #$sql =( "SELECT count(*) FROM `users2` WHERE `email` = '".$username."' AND `password` = '".$passwordSecure."' ");
        $sql = "SELECT count(*) FROM users WHERE   email = '".$username."'  and password ='".$passwordSecure."' ";
       
        $result = mysqli_query($db,$sql) or die(mysql_error());  
        $rows = mysqli_fetch_array($result);
        $id=
        $count = $rows['count(*)'];
        if ($count!=0 ) {
          $select= "SELECT * FROM users WHERE email = '".$username."' ";
          $rslt=mysqli_query($db,$select);
          $rw=mysqli_fetch_array($rslt);
          $iduser=$rw['id'];
          $username=$rw['email'];
          $_SESSION['id'] = $iduser;
          $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = "true";
            
           header("location: compte.php");

  }
  else{
    ?>
            <script language="javascript" type="text/javascript">

              alert(" nom d'utilisateur ou mot de passe incorrecte!");                      

               history.back();                    

          </script>

          <?php
  }
}
}
}


?>


</body>
</html>