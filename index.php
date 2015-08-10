<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$services = $_POST["services"];
$subject = trim($_POST["subject"]);
$message = trim($_POST["message"]);

    if ($name == "" or $email == "" or $message == "") {
        echo "Please enter the required information!";
        exit;
    }
    
    foreach( $_POST as $value ){
        if( stripos($value, 'Content-Type:') !== FALSE ){
            echo "There was a problem with the information you entered.";
            exit();
        }
    }
    
    if ($_POST["address"]){
        echo "You got a problem, son.";
        exit();
    }
    
    require_once("phpmailer/PHPMailerAutoload.php");
    $mail = new PHPMailer;
    
    if(!$mail->ValidateAddress($email)){
        echo "Real email address required";
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
$mail->Subject = $name . '&nbsp;' . 'sent you a message!';
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
    header('Location: contact.php?status=thanks');
    exit();
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    </head>
    <body>
    
<section id="wrapper">
    
    <div class="pt-page pt-page-5" itemscope="itemscope" itemtype="https://schema.org/ContactPage">
        
    <?php if(isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
    
    <h2>Your contact request has been submitted successfully, we hope you have found what you were looking for!</h2>
    
    <?php } else { ?>
    
        <h1 class="head-title">Contact Form Application</h1>
        
        <form id="contact-form" method="post" action="wp-content/themes/fywave-v3/includes/contact.php">
            <table>
                <tbody>
                    <tr>
                        <td><label for="name">Full Name</label><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label><input type="text" name="email"></td>
                    </tr>
                    <tr class="contact-radio">
                        <td><label for="development">Web Development</label><input type="radio" name="services" checked="checked" value="web development"></td>
                        <td><label for="marketing">SEO Marketing</label><input type="radio" name="services" value="seo marketing"></td>
                        <td><label for="both">Both</label><input type="radio" name="services" value="both"></td>
                    </tr>
                    <tr>
                        <td><label for="subject">Subject</label><input type="text" name="subject"></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label><textarea name="message"></textarea></td>
                    </tr>
                    <tr style="display:none;">
                        <td>
                            <label for="address">Address</label><input type="text" name="address">
                            <h1>Humans and monkey's should leave this field alone! If you're an alien, welcome! All other species should vacate my digital realm of awesomeness.</h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <input class="contact-submit" type="submit" value="send">
            
        </form>
<?php } ?>
       
    </div>

</section>
    </body>
</html>