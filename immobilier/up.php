
<?php 

// Include the database configuration file 
include("config.php");
     
if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
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
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO immobilier2 (file_name,uploaded_on ) VALUES $insertValuesSQL"); 
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

 
 } 

if (isset($_POST['submit'])) {
   
   if (!empty('type') && !empty('lieu')&&!empty('surface') && !empty('etat') && !empty('tel') && !empty('commentaire')&& !empty('action')) {
    # code...
   $type = $_POST['type'];
   $lieu = $_POST['lieu'];
   $surface = $_POST['surface'];
   $etat = $_POST['etat'];
   $tel = $_POST['tel'];
   $commentaire = $_POST['commentaire'];
   $prix = $_POST['prix'];
   $action=$_POST['action'];
    
    //echo "type:"  .$type.  "lieu:" .$lieu. "surface:" .$surface. "etat:" .$etat. "tel:" .$tel. "description:" .$commentaire. "prix" .$prix;
        //session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        //sent from Form
        $type=mysqli_real_escape_string($db,$_POST['type']);
        $lieu=mysqli_real_escape_string($db,$_POST['lieu']);
        $surface=mysqli_real_escape_string($db,$_POST['surface']);
        $etat=mysqli_real_escape_string($db,$_POST['etat']);
        $tel=mysqli_real_escape_string($db,$_POST['tel']);
        $commentaire=mysqli_real_escape_string($db,$_POST['commentaire']);
        $prix=mysqli_real_escape_string($db,$_POST['prix']);
        $action=mysqli_real_escape_string($db,$_POST['action']);
        
        if (strlen($tel)<10) {
            echo "Veuillez insérer un numéro de téléphone plut sérieux !";
        }else{

        
        $sql= ("INSERT into `immobilier2` (`type`,`lieu`,`surface`,`etat`,`tel`,`commentaire`,`prix`,`action`) values('".$type."', '".$lieu."','".$surface."', '".$etat."','".$tel."', '".$commentaire."','".$tel."','".$action."')");
            $query = $db->query("SELECT * FROM immobilier2 ORDER BY id DESC ");
  #choufi kayan 3 sema dakhli 3 photos sma 3la hsab mabghya dakhlii                   

if($query->num_rows > 0){
    if($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];?>
  <img src="<?php echo $imageURL; ?>" alt="" width='50%' height='50%' /><br><br>
<?php }
}
?>

<?php
if($query->num_rows > 0){
    if($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];?>
  <img src="<?php echo $imageURL; ?>" alt="" width='50%' height='50%' /><br><br>
<?php }
}
?>

<?php
if($query->num_rows > 0){
    if($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];?>
  <img src="<?php echo $imageURL; ?>" alt="" width='50%' height='50%' /><br><br>
<?php }
}
?>
 <?php echo "<br>type:"  .$type.  " <br>lieu:" .$lieu. "<br>surface:" .$surface. "<br>etat:" .$etat. "<br>tel:" .$tel. "<br>description:" .$commentaire. "<br>prix :" .$prix. "<br>" .$action ; ?>


  <?PHP

$result=mysqli_query($db,$sql);
}
}
}
}
?>
