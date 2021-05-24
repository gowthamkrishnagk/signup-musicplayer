<?php
    $name = $_POST['fn'];
    $dob = $_POST['date'];
    $Country = $_POST['Country'];
    $phnumber = $_POST['number'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $conpass = $_POST['conpass'];


    $conn = new mysqli('localhost','root','','symphony');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("INSERT into signup (fn,date,Country,number,mail,pass,conpass) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisss",$name,$dob,$Country,$phnumber,$email,$password,$conpass);
        $stmt->execute();
        $stmt->close();
        $conn->close();

    }
?>
<?php

header("Location:index.html"); ?>
<html>

<head>
  <title>Symphony</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</head>
<body>
<button onclick="myFunction() alt()">Show mail Status</button>
<div>


<?php

use PHPMailer\PHPMailer\PHPMailer;


require 'phpmailer/vendor/autoload.php';
//////////

    /////////////
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host  = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'symphony141539@gmail.com';
    $mail->Password = 'kojpkrxilopbxtcd';
    $mail->SMTPSecure = 'tls';
    $mail->Port  = 587;

    $mail->setFrom('symphony141539@gmail.com', 'Symphony');
    $mail->addBCC('gowthamkrishna.mails@gmail.com');
     $mail->addBCC('hemacbe01@gmail.com');
      $mail->addBCC('shreenethira25@gmail.com');
$mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Symphony';
    $mail->Body = '<h1 style="text-align:center;">Hello Welcome to Symphony</h1><br> <p>Thanks for joining with us!!</p>
    <br><p>We hope you enjoy your musics through Symphony with high streaming quality songs of different languages without any limitations.</p>
      <br> <h3><b>Reply us  for More Interactions</b> <br>
    <span style="text-align:center;"><i>@symphony141539@gmail.com</i></span></h3>';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
</div>

<script >
function myFunction() {
var x = document.getElementById("myDIV");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}
function alt() {
   alert("mail sent successfully!");
}
</script>
</body>

</html>
