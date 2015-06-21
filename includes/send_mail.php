<?php
$error_msg = "";
              
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = $_POST['name'];
    $email_to = "christine.n.hill@gmail.com";
    $email_from = $_POST['email'];   
    $email_message = $_POST['message']; 
 
    if ($email_from == ""){
        $error_msg .= "No Sender";
    }
    if ($email_subject == ""){
        $error_msg .= "No Subject";
    }
    if ($email_message == ""){
        $error_msg .= "No message";
    }
    
    if (empty($error_msg)) {
        # Build the headers
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: <' . $email_from . '>' . "\r\n";
        # Subject
        $email_subject = $name . " has sent you an email!";
        # Send the email
        mail($email_to,$email_subject,nl2br($email_message),$headers);
        header('Location: success.html');
    } else {
        header('Location: error.html');
    }
}
