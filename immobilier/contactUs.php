<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style2.css" type="text/css" >  
  <script src="https://kit.fontawesome.com/eace1766f7.js" crossorigin="anonymous"></script>
  <title>contact Us</title>

  <style type="text/css">
html{
  background-image: url(contact.jpg);
  background-size: cover;
}


div.elem-group {
  margin: 40px 0;
}

label {
  display: block;
  font-family: 'Aleo';
  padding-bottom: 4px;
  font-size: 1.25em;
}

input, select, textarea {
  border-radius: 2px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Aleo';
  width: 500px;
  padding: 8px;
}

textarea {
  height: 250px;
}

button {
  height: 50px;
  background: green;
  color: white;
  border: 2px solid darkgreen;
  font-size: 1.25em;
  font-family: 'Aleo';
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  border: 2px solid black;
  color: white;
}
.form{
    margin-left: 700px;
}
.container{

    padding: 16px;
   
    width: 50%;
    background-color: #;
    text-align: center;
    float: left ;
    margin-top: 25%;
    border-style: solid;
    border-color: white;
    background-color: ;
}
.container:hover{
    color: green;
}
.information {
  display: flex;
  color: #555;
  margin: 0.7rem 0;
  align-items: center;
  font-size: 0.95rem;
  color: WHITE;
}
.icon {
  width: 28px;
  margin-right: 0.7rem;
}
.alert-error {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.alert-seccesse{
  padding: 20px;
  background-color: green; /* Red */
  color: white;
  margin-bottom: 15px;
}

  </style>

<script type="text/javascript">
  if (window.history.replaceState) {
    window.history.replaceState(null,null,window.location.href);
  }
  function closebtn() {
    document.getElementById("alert").style.width = "0";
}
</script>

</head>
<body>
  <nav> 
   
    <a class="active "href="monSite1.html">Home</a>
    
                  
   </nav>
     <center><h1 style="size: 50px;"><I>Contact Us </I></h1></center>
     
     

<div class="container">
    <div class="info">
            <div class="information">
              <img src="location.png" class="icon" alt="" />
              <p><b>Université Abdel Hamid Ibn Badis </b></p>
            </div>
            <div class="information">
              <img src="email.png" class="icon" alt="" />
              <p> <b>hassibaizza827@gmail.com</b></p>
            </div>
            <div class="information">
              <img src="phone.png" class="icon" alt="" />
              <p ><B>07-98-61-47-95 </B>---</p>
              <p >- <B>05-58-81-22-15</B></p>
            </div>
          </div>
</div>
</div>




<div class="form"><form  method="POST">
  <div class="elem-group">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Your E-mail</label>
    <input type="email" id="email" name="email" placeholder="john.doe@email.com" required>
  </div>
  
  <div class="elem-group">
    <label for="message">Write your message</label>
    <textarea id="message" name="message" placeholder="Say whatever you want." required></textarea>
  </div>
  <button type="submit" name="submit">Send Message</button>
</form></div>



 <footer>
       <P> Follow us : </P>
      <a target="_blank"  href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
    <a target="_blank"  href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
    <a target="_blank" href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a> 
    <a target="_blank" href="https://twitter.com"><i class="fa-brands fa-twitter-square"></i></a> 
                
              <p><center>Copyright &copy; 2022 Your Compan</center></p>
                
  </footer>

<?php
use PHPMailer\PHPMailer\PHPMailer;

$alert = '';
require_once 'phpmailer\exception.php';
require_once 'phpmailer\PHPMailer.php';
require_once 'phpmailer\SMTP.php';

$mail= new PHPMailer(true);
  
if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    try{
      $mail->isSMTP();
      $mail->Host ='smtp.gmail.com';
      $mail->SMTPAuth = true ;
      $mail->username='hassibaizza827@gmail.com'; //smtp server 
      $mail->password='@25022017Hassiba';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port ='587';

      $mail->setFrom('hassibaizza827@gmail.com');
      

      $mail->isHTML(true);
      $mail->Subject = 'Message Received (contact page) ';
      $mail->Body = "<h3>Name:$name <br> Email:$email <br> Message:$message <br> </h3>";

      $mail->send();
      echo'<div class="alert-seccesse" > 
              <span onclick="closebtn();" id="alert"> &times ;<span> message sent thank you for contacting us !
              </div>';


    }catch(Exception $e){
       echo'<div class="alert-error" > 
                <span class="closebtn"  onclick=" return closebtn();" > &times; </span> Message Not send !
                </div>';

    }
}
?>


</body>
</html>