<!DOCTYPE html>
<html>
    <head>
        <title>registration</title>
        <meta charset='utf-8'>
    </head>
    <body>

<h1>Insciption</h1> 
<?php


 include("config.php");


 if (isset($_POST['submit'])) {
   
   if (!empty('mail') && !empty('pass')) {
    # code...
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $date = $_POST['date'];
   
   $mail = $_POST['mail'];
   $password= $_POST['passw'];
   $numID= $_POST['numID'];
   
   $sexe = $_POST['sexe'];
    
   #echo "NOM:"  .$fname.  "PRENOM:" .$lname  "DATE:"  .$date "REGION:"  .$région "PASSW:" .$mail "PASSWORD:" .$password   "SEXE:" .$sexe;

        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        // username and password sent from Form
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        $date=mysqli_real_escape_string($db,$_POST['date']);
        #$région=mysqli_real_escape_string($db,$_POST['région']);
        $mail=mysqli_real_escape_string($db,$_POST['mail']);
        $password=mysqli_real_escape_string($db,$_POST['passw']);
        $passwordSecure=md5($password);
        $confpassword=mysqli_real_escape_string($db,$_POST['confpassw']);
        $confpasswordSecure=md5($confpassword);

        $numID=mysqli_real_escape_string($db,$_POST['numID']);
        $sexe=mysqli_real_escape_string($db,$_POST['sexe']);


        $sql="SELECT * FROM `users` WHERE   `email` = '".$mail."' ";
        $result = mysqli_query($db,$sql) or die(mysli_error());  
        $rows = mysqli_num_rows($result);
        if ($rows) {
          ?>
          <script language="javascript" type="text/javascript">

              alert('email déja existe !');                      

               history.back();                    

          </script>

          <?php
        }else{
          if ($_POST['passw']!= $_POST['confpassw']) {
                    ?>
          <script language="javascript" type="text/javascript">

              alert("votre mot de passes n'est pas équivalentes !");                      

               history.back();                    

          </script>

          <?php
        }else {
          if (strlen($password)<6) {
              ?>
          <script language="javascript" type="text/javascript">

              alert("votre mot de passe est trés court !");                      

               history.back();                    

          </script>

          <?php
          }else {
            if ($date>2005) {
              ?>
          <script language="javascript" type="text/javascript">

              alert("la date que vous avez saisie est invalide('trés petit utilisataeur ') !");                      

               history.back();                    

          </script>

          <?php
            }else{
              if (strlen($numID)!=10) {
                 ?>
            <script language="javascript" type="text/javascript">

              alert(" num d'identité invalide!");                      

               history.back();                    

          </script>

          <?php
              }
              else{


              $sql= ("INSERT into `users` (`nom`,`prénom`,`date de naissance`,`email`,`password`,`confpassword`,`numID`, `sexe`) values('".$fname."', '".$lname."' , '".$date."', '".$mail."', '".$passwordSecure."', '".$confpasswordSecure."' , '".$numID."', '".$sexe."' )");
              
              


        $result=mysqli_query($db,$sql);
        if ($result) {
          

          $select= "SELECT * FROM users WHERE email = '".$mail."' ";
          $rslt=mysqli_query($db,$select);
          $rw=mysqli_fetch_array($rslt);
          $iduser=$rw['id'];
           $mail=$rw['email'];
          $_SESSION['id'] = $iduser;
          $_SESSION['username'] = $mail;
          header("location: compte.php");
               
            
          /*echo "<center><div class='success'>
             <h1 style='color:green'>vous avez inscris avec succés</h1>
             <h3>Cliquez ici pour vous accéder <a href='connexion.html'>Se connecter</a></H3>
              </div></center>";*/
            
          }
        }
            }
           }

         }
      }

        


          

    }

        
        
  }
        
}





        
?>

</body>
</html>






