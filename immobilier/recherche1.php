


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
}

.pub:hover{
 box-shadow: 0 0 0 px #e5e5e5;
 cursor:pointer;
}

 .bar input {
    width: 100px;
    margin-right:2%;
    float: right;
}

.choix select.transaction{
    width:20%;
    float: left;

}

.choix select.type{
    width:20%;
    float: left;
    margin-right: 2%;
}

.clearfix{
    clear:both
}
.button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 12px;
  margin: 8px 0;
  border: none;
  width: 10%;
  margin-left: 2%;

 
}
.button:hover{
    opacity:1;
}
input[type=search] {
    width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin-left: 2%;
}
select{
    width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.prix{
    width: 80%;
}
.prix label{
    width: 4%;
    float: left;
    margin-left: 2%;
    margin-right: 20px;
    margin-top: 2%;

}

.prix input{
     width: 30%;
     margin-right:2%;
     padding: 12px 20px;
    float: left;
     margin-top: 1%;
}


.titre{
    width: 80%;
    height: 0%;
    
    margin-top: 8%;
    font-size: 20px;
    /*background-color: #708090;*/
}
.favoris{

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
.favoris:hover{
         background-color:#DCDCDC ;
        color: #75b1d1;
 }




	</style>
</head>
<body>
	 



   <form  method="GET" >
    <fieldset>
        <legend>Recherche</legend>
   <div class="bar">
    
        <input type="search" name="search0" placeholder="recherche par mot clé " >
                
    </div> 
    <div class="choix">
                <select  name="type" class="type">
                    <option selected>type</option>
                    <option >Appartement </option>
                    <option >villa</option>
                    <option >Duplex</option>
                    <option >studio</option>
                    <option >colocation</option>
                    <option >magasin</option>

                </select>
                <select  name="transaction" class="transaction">
                    <option selected>transaction</option>
                    <option name="à louer">à louer</option>
                    <option name="à vendre">à vendre</option><br>
                </select>
            </div>
    
            <div class="prix">
                
                <label class="labprix">prix:</label>
                <input type="text" name="prix" >
                
            </div>
            <div class="clearfix"></div>
            <input type="submit" class="button" name="submit" value="rechercher">
</form>
</fieldset>

</body>
</html>

<?php 

// recherche par type 
include("config.php");
$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");
    
    if (isset($_GET['search0']) AND !empty($_GET['search0'])) {
    $recherche = htmlspecialchars($_GET['search0']);
    $sql=$db->query("SELECT * FROM `immobilier2` WHERE `type` LIKE '%$recherche%' ORDER BY id DESC ");
    $sql=$db->query("SELECT * FROM `immobilier2` WHERE `transaction` LIKE '%$recherche%' ORDER BY id DESC ");
 
while($r = mysqli_fetch_array($sql)) { ?>
<div class="pub">
    <img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
    <?php
    echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'],  "<br>" .$r['transaction'] ,"<br><br><br><br>" ;
    ?>
   <a href="insertFavoris.php?id=<?php echo $r['id']; ?>"  ><button class="favoris" onclick="return favoris();">favoris</button></a>    
 </div><br><br>
<?php
                
}
}



// recherche par discription

$sql= $db->query( "SELECT * FROM `immobilier2` ORDER BY id DESC  ");
    
    if (isset($_GET['search0']) AND !empty($_GET['search0'])) {
    $recherche = htmlspecialchars($_GET['search0']);
    $sql=$db->query("SELECT * FROM `immobilier2` WHERE `commentaire` LIKE '%$recherche%' ORDER BY id DESC ");
    
 
while($r = mysqli_fetch_array($sql)) { ?>
<div class="pub">
    <img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
    <?php
    echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'],  "<br>" .$r['transaction'] ,"<br><br><br><br>" ;
    ?>
   <a href="insertFavoris.php?id=<?php echo $r['id']; ?>"  ><button class="favoris" onclick="return favoris();">favoris</button></a>    
 </div><br><br>
<?php
                
}
}





// recherche avancée 

if (isset($_GET['submit'])) {
    $type=$_GET['type'];
    $transaction = $_GET['transaction'];
    $prix=$_GET['prix'];
    
       
           $sql1=$db->query("SELECT * FROM `immobilier2` WHERE `type` = '$type' AND `prix` ='$prix' AND  `transaction` = '$transaction' ");

           while($r = mysqli_fetch_array($sql1)) { ?>
        <div class="pub">
            <img src="<?php echo $r['file_name']; ?>" alt=""  class="img" width="50%",height="50%"/><br><br>
            <?php
            echo "<br> ".$r['type'] , "<br>" .$r['lieu'] , "<br>" .$r['surface'],  "<br>" .$r['etat'],  "<br>" .$r['tel'],  "<br>" .$r['commentaire'], "<br>".$r['prix'],"<br><br><br><br>" ;
            ?>
           <a href="insertFavoris.php?id=<?php echo $r['id']; ?>"  ><button class="favoris" onclick="return favoris();">favoris</button></a>    
         </div><br><br>
    <?php
                
            }

        
      
    }


?>