   


  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> mot de passe oublier </title>


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
  
<?php
//mot de passe oublier 
if (isset($_GET['oublier'])) {?>
  <form class=""  method="POST" action="oublie.php">
    <div class="container">
    <fieldset class="connexion">
    <legend>mot de passe oublier:</legend>
    <input type="hidden" name="id">

    <label>Entrez votre email</label>
    <input type="text" name="mail" class="control" placeholder="écrire..."><br><br>

    <label>Quelle est votre num d'identité ?</label>
    <input type="text" name="numID"  placeholder="écrire..."><br><br>
    <input type="submit" name="sub" class="registerbtn"  value="envoyer">
  </div>
 </fieldset>
   </form>
<?php }?>


<?php 
//modifier mot de passe
if (isset($_GET['passmod'])) { ?>
  <form method="POST" action="updatepassw.php">
    <div class="container">
    <fieldset class="connexion">
    <legend>Modifier mot de Passe:</legend>
    <input type="hidden" name="id">

    <label>Mot de Passe Actuelle</label>
    <input type="password" name="passwACT"  placeholder="écrire..."><br><br>
    <hr>
    <label>Nouveau Mot de Passe</label>
    <input type="password" name="passwNEW"  placeholder="écrire..."><br><br>
    <hr>
    <label>Confirmer Mot de Passe</label>
    <input type="password" name="passwCONF"  placeholder="écrire..."><br><br>
    <hr>
    <input type="submit" name="submit" class="registerbtn" value="envoyer">

    </div>
  </fieldset>
  </form>

  
<?php }?>



</body>
</html>