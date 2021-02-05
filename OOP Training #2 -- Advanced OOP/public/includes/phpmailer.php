<?php

function send_email($client_email, $client_name, $user_filename, $message){


    require 'PHPMailer/PHPMailerAutoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'christag392@gmail.com';                     // SMTP username
        $mail->Password   = 'Ranger392//';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($client_email, 'Message from ' . $client_name . ' ');
        $mail->addAddress('christag392@gmail.com', 'Support Team');     // Add a recipient
//        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($client_email, $client_name);
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');



        $file_path = 'user_files/' . $user_filename;

        // Attachments
        $mail->addAttachment($file_path);         // Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Message from Client';
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        echo '<div class="bg-success"> Message has been sent. </div>';
    } catch (Exception $e) {
        echo '<div class=bg_danger"> Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }
}

