<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajouter une fiche d'immobilier</title>
    <style >
        .pub{
            float:center;
            padding: 10px;
            text-align: center;

            /*border: solid;
            min-width:600px ;
            width:  30%;
            margin-left: 30%;*/
        }
        .pub:hover{
            box-shadow: 0 0 0 px #e5e5e5;
            cursor:pointer;
        }
    </style>


</head>
<body>


<?php
include("config.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {

     $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $fileNames = $_FILES['files']['name'];
  
    $fileNames = array_filter($_FILES['files']['name']); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
   
   if (!empty($fileNames) && !empty('type') && !empty('lieu') && !empty('surface') && !empty('etat') && !empty('tel') && !empty('commentaire') && !empty('prix') && !empty('action')) {
    # code...

    $id=$_POST['id'];
   $type = $_POST['type'];
   $lieu = $_POST['lieu'];
   $surface = $_POST['surface'];
   $etat = $_POST['etat'];
   $tel = $_POST['tel'];
   $commentaire = $_POST['commentaire'];
   $prix=$_POST['prix'];
   $action=$_POST['action'];
  // $nom=$_POST['user'];
        //session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "FILIES")
          
        {

          foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        }

        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO immobilier2 (file_name) VALUES $insertValuesSQL"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    }
          
        //sent from Form
        $id=mysqli_real_escape_string($db,$_POST['id']);
        $type=mysqli_real_escape_string($db,$_POST['type']);
        $lieu=mysqli_real_escape_string($db,$_POST['lieu']);
        $surface=mysqli_real_escape_string($db,$_POST['surface']);
        $etat=mysqli_real_escape_string($db,$_POST['etat']);
        $tel=mysqli_real_escape_string($db,$_POST['tel']);
        $commentaire=mysqli_real_escape_string($db,$_POST['commentaire']);
        $prix=mysqli_real_escape_string($db,$_POST['prix']);
        $action=mysqli_real_escape_string($db,$_POST['action']);
        //$nom=mysqli_real_escape_string($db,$_POST['user']);


        if (strlen($tel)<10) {
            ?>
          <script language="javascript" type="text/javascript">

              alert("Num de telephone invalide !");                      

               history.back();                    

          </script>
          <?PHP 
        }else {
          
          $sql= ("INSERT INTO  `immobilier2` (`id`,`file_name`,`type`,`lieu`,`surface`,`etat`,`tel`,`prix`,`commentaire` ,`transaction`,`user`) values('".$id ."' ,'".$fileName."', '".$type."', '".$lieu."','".$surface."', '".$etat."','".$tel."','".$prix."',  '".$commentaire."' ,'".$action."', '".$_SESSION['username']."')");
            $result=mysqli_query($db,$sql);
       
        $result=mysqli_query($db,$sql);
        if ($result) {
            ?>
            <div class="pub">
                <?php 
            $query = $db->query("SELECT `file_name` FROM immobilier2 ORDER BY id DESC");
            if  ($query->num_rows > 0) {
                if ($row = $query->fetch_assoc()) {
                   $imageURL = 'uploads/'.$row["file_name"];
                    echo " </br><h1> vous avez ajouter une nouvelle annonce !</h1><br>";
                    
                    ?>
                     <div class="img"><img src="<?php echo $imageURL; ?>" alt="" width='50%' height='50%'/></div><br><br>
                     

                     <?php 
                     
                    echo "<br>type:"  .$type.  " <br>lieu:" .$lieu. "<br>surface:" .$surface. "<br>etat:" .$etat. "<br>tel:" .$tel. "<br>discription:" .$commentaire. "<br>prix :" .$prix. "<br>" .$action ; 
                    
                }
            }
            ?>
            
            </div>
    <?php         
        }
        
        
  }

        
        

        
        
  }
        
}?>




