

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $myEmail = "danieleche7@gmail.com";
    $myEmailPassword = "PhebenDanny1";
    $myPersonalEmail = "engage@tedxoguiroad.com";

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    if(isset($_POST['submit'])) {

        // Collect POST data from form
        $email = $_POST['email'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;
        $mail->Password = $myEmailPassword;
        $mail->port = 587;
        $mail->SMTPSecure = "ssl";

        $mail->setFrom($email, 'Mailer');
        $mail->addAddress($myPersonalEmail);
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        $mail->isHTML(true);    
        $mail->Subject = $_POST['name'];
        $mail->Body = $_POST['message'];

        try {
            $mail->send();
            echo 'Your message was sent successfully!';
            header('Location: index.php#form-contact');
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
        }
        
    } else {
        echo "There is a problem with the contact.html document!";
		header('Location: index.php#form-contact');
    }
    
?>