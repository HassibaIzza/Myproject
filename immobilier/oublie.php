<?php 
//récupérer le mot de passe par numID
include("config.php");
if (isset($_POST['sub'])) {
  if (!empty('numID') && !empty('mail')) {

    $numID= $_POST['numID'];
    $mail= $_POST['mail'];
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
      
      $numID=mysqli_real_escape_string($db,$_POST['numID']);
      $mail=mysqli_real_escape_string($db,$_POST['mail']);

      $query="SELECT count(*) FROM users WHERE numID= '".$numID."' and email ='".$mail."' ";
      $result=mysqli_query($db,$query);
      $row=mysqli_fetch_array($result);
      $count = $row['count(*)'];
      if ($count != 0) {

        session_start();
          //les var session 
         $select= "SELECT * FROM users WHERE email = '".$mail."' ";
          $rslt=mysqli_query($db,$select);
          $rw=mysqli_fetch_array($rslt);
          $iduser=$rw['id'];
          $username=$rw['email'];
          $_SESSION['iduser'] = $iduser;
          $_SESSION['mail'] = $username;
         ?>
            
          <form   method="POST" action="réinstalpassw.php" >
            <div class="container">
        <fieldset>
        <legend>mot de passe oublier:</legend>
        <input type="hidden" name="id">

        <label>Entrez un nouveau mot de passe </label>
        <input type="password" name="passw"  placeholder="écrire..."><br><br>

        <label>Confirmer votre mot de passe</label>
        <input type="password" name="confpassw"  placeholder="écrire..."><br><br>
        <input type="submit"  class="registerbtn" name="sub1" value="envoyer" >
      </div>
     </fieldset>
       </form>  

       <?php 
       session_start();
    include('config.php');
    
    if (isset($_POST['sub1'])) {
    if (!empty('passw')&& !empty('confpassw')) {

        if ($_SERVER['REQUEST_METHOD']== 'POST') {

            $password =mysqli_real_escape_string($db,$_POST['passw']);
            $passwordSecure=md5($password);
            $confpassword =mysqli_real_escape_string($db,$_POST['confpassw']);
            $confpasswordSecure=md5($confpassword);

            if($password!=$confpassword){
               ?>
            <script language="javascript" type="text/javascript">

              alert(" Votre mot de passes n'est pas équivalents !");                      

               history.back();                    

            </script>

          <?php
            }else{


            $sql= "UPDATE users SET password='$confpasswordSecure' WHERE email='".$_SESSION['mail']."'  ";
            $result=mysqli_query($db,$sql);
            $r=mysqli_fetch_array($result);
            if ($r) {
              echo "sa marche !";
            }
            else{
              echo "false";
            }
            
        }
    }
}
}


?>

    
       <?php
      }else
      { ?>
            <script language="javascript" type="text/javascript">

              alert(" votre informations est incorrecte veuillez resseyez!");                      

               history.back();                    

          </script>

          <?php
          }

    }
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  
  <style type="text/css">
    
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}
    
    input[type=text], input[type=password] ,input[type=date],select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}


  </style>
</head>
<body>

</body>
</html>