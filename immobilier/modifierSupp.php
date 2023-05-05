

<?php 


 
if (isset($_GET['id'])) {
    include("config.php");
    $sql = "SELECT * FROM `immobilier2` WHERE `id`='".$_GET['id']."' ";
    $result=mysqli_query($db,$sql);
    $row= mysqli_fetch_array($result);
        

 


        

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style2.css" type="text/css" >
    <script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
    <title>ajouter une fiche d'immobilier</title>
    

    <style >
        .img{
            

        }
    </style>

    <script type="text/javascript">
        function verifjs()
        {
        return window.confirm('souhaitez-vous vraiment vous déconnecter !'); 
        }
    </script>


</head>
<body>
    
        <nav> 
                     
              <a class="active "href="monSite1.html" >Home</a>
              <a href="#" >Contact</a>
              <a href="#" >About Us</a>
              <a href="consulter.php" >Immobillier</a>
              <a href="lgout.php?déconnecter=true" onclick="return verifjs();" >Log out</a>
              
            

        </nav> 
    


 <br><br> 
<form method="POST" action="update.php" enctype="multipart/form-data" >
    <fieldset>
    <legend>Modifier une fiche d'immobilier</legend>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    
    <input type="text" class="control" name="type" id="type" value="<?= $row['type'] ?>" required="required" placeholder="le Type d'immobilliér">
    <input type="text"class="control"  name="lieu"  id="lieu" value="<?= $row['lieu'] ?>" required="required"placeholder="lieu d'immobilliér">
    <input type="text" class="control" name="surface" id="surface" value="<?= $row['surface']   ?>" required="required" placeholder="Surface d'immobilliér">
    <input type="text"class="control"  name="etat" id="etat"required="required" value="<?= $row['etat'] ?>" placeholder="Etat d'immobilliér"> 
    <input type="text" class="control" name="tel" id="tel" value="<?= $row['tel'] ?>" required="required" placeholder="Numero de telephone">
    <input type="text" class="control" name="prix" id="prix" required="required" value="<?= $row['prix'] ?>" placeholder="prix d'immobilier">
    <textarea  cols="10" rows="4" class="control" name="commentaire" id="commentaire" value="<?= $row['commentaire'] ?>" required="required" placeholder="Description"></textarea><br><br>

    <input type="file" class="control" name="files[]" value="<?php echo "" ?> "required multiple/><br><br>

    <select   name="action"required="required" class="control">
            <OPTION>àvendre\louer</OPTION>
            <OPTION>à vendre</OPTION>
            <OPTION>à louer</OPTION>
    </select><br><br>
    
     <input type="submit"class="register" name="submit" value="Modifier"><br>

    

</fieldset>    
</form>
<?php }?>


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



