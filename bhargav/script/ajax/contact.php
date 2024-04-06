<?php
// Include database connection
include '../../conection/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';

$actionType = $_POST['actionType'];

if($actionType == 'contactAdd')
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $status = 'Active';

    if($name !='' || $email !='' || $subject !='' || $message !=''){
    
        $sql = "INSERT INTO contact_inquiry (name, email, subject, message, status, ip, browser) VALUES ('$name', '$email','$subject','$message','$status','$ip','$browser')";
        $id = $conn->query($sql);

        $result = array(
            "message" => 'Contact Added Success',
            "msgcode" => 1
        );

        // Mail to Admin
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abcdabcd102030405060@gmail.com';
        $mail->Password = 'uqkbvegtfzphylfa';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('bhargavpatel78910@gmail.com', 'Bhargav Labakamna');
        $mail->addAddress('bhargavlabakamna@gmail.com', $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = file_get_contents('../../mail-template/contact_to_admin.html');
        $mail->Body = str_replace('{{name}}', $name, $mail->Body);
        $mail->Body = str_replace('{{email}}', $email, $mail->Body);
        $mail->Body = str_replace('{{subject}}', $subject, $mail->Body);
        $mail->Body = str_replace('{{message}}', nl2br($message), $mail->Body);
        $mail->send();

        // mail to user
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abcdabcd102030405060@gmail.com';
        $mail->Password = 'uqkbvegtfzphylfa';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('bhargavpatel78910@gmail.com', 'Bhargav Labakamna');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = file_get_contents('../../mail-template/contact_to_user.html');
        $mail->Body = str_replace('{{name}}', $name, $mail->Body);
        $mail->Body = str_replace('{{email}}', $email, $mail->Body);
        $mail->Body = str_replace('{{subject}}', $subject, $mail->Body);
        $mail->Body = str_replace('{{message}}', nl2br($message), $mail->Body);
        $mail->send();
    }
    else
    {
        $result = array(
            "message" => 'Please Fill Required Data',
            "msgcode" => 0
        );
    }
}

echo json_encode($result);

?>