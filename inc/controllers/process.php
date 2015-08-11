<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$services = $_POST["services"];
$subject = trim($_POST["subject"]);
$message = trim($_POST["message"]);

    if ($name == "" or $email == "" or $message == "") {
    ?>
<?php require_once('inc/views/header.php'); ?>
        <section ng-app="contactApp">
            <div ng-controller="Errors">
            <p ng-repeat="input in messages">{{ input.empty }}</p>
            </div>
        </section>
<?php require_once('inc/views/footer.php'); ?>
    <?php
        exit;
    }
    
    foreach( $_POST as $value ){
        if( stripos($value, 'Content-Type:') !== FALSE ){
?>
<?php require_once('inc/views/header.php'); ?>
        <section ng-app="contactApp">
            <div ng-controller="Errors">
            <p ng-repeat="input in messages">{{ input.security }}</p>
            </div>
        </section>
<?php require_once('inc/views/footer.php'); ?>
    <?php
            exit();
        }
    }
    
    if ($_POST["address"]){
?>
<?php require_once('inc/views/header.php'); ?>
        <section ng-app="contactApp">
            <div ng-controller="Errors">
            <p ng-repeat="input in messages">{{ input.spam }}</p>
            </div>
        </section>
<?php require_once('inc/views/footer.php'); ?>
    <?php
        exit();
    }
    
    require_once("phpmailer/PHPMailerAutoload.php");
    $mail = new PHPMailer;
    
    if(!$mail->ValidateAddress($email)){
?>
<?php require_once('inc/views/header.php'); ?>
        <section ng-app="contactApp">
            <div ng-controller="Errors">
            <p ng-repeat="input in messages">{{ input.email }}</p>
            </div>
        </section>
<?php require_once('inc/views/footer.php'); ?>
    <?php
    }
    
$email_body = "";
$email_body = $email_body . "Name:" . "&nbsp;" . $name . "<br>";
$email_body = $email_body . "Email:" . "&nbsp;" . $email . "<br><br>";
$email_body = $email_body . "Services:" . "&nbsp;" . $services . "<br><br>";
$email_body = $email_body . "Subject:" . "&nbsp;" . $subject . "<br>";
$email_body = $email_body . "Message:" . "&nbsp;" . $message . "<br>";

    
    //Set who the message is to be sent from
$mail->setFrom($email, $name);
//Set who the message is to be sent to
$mail->addAddress('info@fywave.com', 'Rafay Choudhury');
//Set the subject line
$mail->Subject = $name . ' sent you a message!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($email_body);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "There was a problem sending your email" . $mail->ErrorInfo;
    exit;
}   
    header('Location: index.php?status=thanks');
    exit();
}
?>