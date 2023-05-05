
<?PHP 
if (isset($_POST['submit'])) {
     include("config.php");
     if (!empty($_POST['passwACT']) && !empty($_POST['passwNEW']) && !empty($_POST['passwCONF'])) {
        
        $passwACT=$_POST['passwACT'];
        $passwNEW=$_POST['passwNEW'];
        $passwCONF=$_POST['passwCONF'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           

           $passwACT =mysqli_real_escape_string($db,$_POST['passwACT']);
           $passwNEW =mysqli_real_escape_string($db,$_POST['passwNEW']);
           $passwCONF =mysqli_real_escape_string($db,$_POST['passwCONF']);

           $passwACTsecure=md5($passwACT);
           $passwNEWsecure=md5($passwNEW);
           $passwCONFsecure=md5($passwCONF);

           $query="SELECT * FROM `users` WHERE `password` = '$passwACTsecure' ";    
           $rslt=mysqli_query($db,$query);
           $m=mysqli_num_rows($rslt) ;
           if ($m== true) {
             if ($passwNEW != $passwCONF) {
               echo "votre mot de pass n'est pas équivalents!!";
             }
             else{

             $modif= "UPDATE `users` SET `password` ='".$passwNEWsecure."' , `confpassword`= '".$passwCONFsecure."' WHERE `password`= '".$passwACTsecure."' ";
             $result=mysqli_query($db,$modif);
             if ($result) {
                ?>
            <script language="javascript" type="text/javascript">

              alert(" Mot de passe modifier avec successé!");                      

               history.back();                    

          </script>

          <?php
             }else{
              echo "faill !";
             }

             
        }
     }else{ echo "false";}
  }
}
}

?>