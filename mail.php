<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';
    function sendmail($name,$username,$password){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'vu1thanhluan1@gmail.com'; // SMTP username
            $mail->Password = 'zhld ufxx dmvv uwrs'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Cổng SMTP (thường là 587 hoặc 465)
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('vu1thanhluan1@gmail.com', 'Drug Store');
            $mail->addAddress($username, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Quên mật khẩu';
            $mail->Body    = 'Chào <b>'.$name.'</b> <br>Đây là tin nhắn phản hồi yêu cầu quên mật khẩu của bạn<br>Mật khẩu của bạn là <b>'.$password.'</b>';

            $mail->send();
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    }

?>