<?php 
include("config.php");
if (isset($_POST['submit'])) {

    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $fileNames = $_FILES['files']['name'];
    $fileNames = array_filter($_FILES['files']['name']); 

if (!empty($fileNames) && !empty('type') && !empty('lieu') && !empty('surface') && !empty('etat') && !empty('tel') && !empty('commentaire') && !empty('prix')){


if($_SERVER['REQUEST_METHOD']== 'POST' || $_SERVER['REQUEST_METHOD']== 'FILES' ){
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $type=mysqli_real_escape_string($db,$_POST['type']);
        $lieu=mysqli_real_escape_string($db,$_POST['lieu']);
        $surface=mysqli_real_escape_string($db,$_POST['surface']);
        $etat=mysqli_real_escape_string($db,$_POST['etat']);
        $tel=mysqli_real_escape_string($db,$_POST['tel']);
        $commentaire=mysqli_real_escape_string($db,$_POST['commentaire']);
        $prix=mysqli_real_escape_string($db,$_POST['prix']);
        $transaction=mysqli_real_escape_string($db,$_POST['action']);

        $id=$_POST['id'];
        $type=$_POST['type'];
        $lieu=$_POST['lieu'];
        $surface=$_POST['surface'];
        $etat=$_POST['etat'];
        $tel=$_POST['tel'];
        $commentaire=$_POST['commentaire'];
        $prix=$_POST['prix'];
        $tranaction=$_POST['action'];

        foreach($fileNames as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
            
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';    
                }    
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 

        //$sql="UPDATE `immobilier2` SET `file_name` ='".$fileName ."', `type`='".$type."', `lieu`='".$lieu."',    `surface`='".$surface."', `etat`='".$etat."', `tel`='".$tel."', `prix`='".$prix."', `commentaire`='".$commentaire."' , `action`='".$action."'   "; '".$_POST['id']."'
	 
        $id=$_POST['id'] ;
        $sql="UPDATE immobilier2 SET file_name='$fileName' ,type='$type' , lieu='$lieu',    surface='$surface', etat='$etat', tel= '$tel', prix='$prix', commentaire='$commentaire' , transaction='$transaction' WHERE id='$id'     ";       
        $result=mysqli_query($db,$sql);
        //$col=mysqli_num_rows($result);
        if ($result) {

            ?>
            <script language="javascript" type="text/javascript">

              alert(" modification réussie !");                      

               history.back();                    

          </script>

          <?php
        }
        else{
           ?>
            <script language="javascript" type="text/javascript">

              alert(" Aucune modification !");                      

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
    <title>Modifier fiche d'immobilier </title>
    <link rel="stylesheet" href="style2.css" type="text/css" >
</head>
<body>



</body>
</html>