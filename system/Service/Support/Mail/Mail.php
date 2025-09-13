<?php

namespace System\Service\Support\Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    public function send($emailAddress, $subject, $body)
    {
       return $this->sendMethod($emailAddress, $subject, $body);
    }
    public function sendMethod($emailAddress, $subject, $body)
    {
        $mail = new PHPMailer(config('mail.SMTP.PHPMailer'));

        try {

            $mail->CharSet = config('mail.SMTP.CharSet');
            //Server settings
            $mail->SMTPDebug = config('mail.SMTP.SMTPDebug');
            $mail->isSMTP();
            $mail->Host       = config('mail.SMTP.Host');
            $mail->SMTPAuth   = config('mail.SMTP.SMTPAuth');
            $mail->Username   = config('mail.SMTP.Username');
            $mail->Password   = config('mail.SMTP.Password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = config('mail.SMTP.Port');

            //Recipients
            $mail->setFrom(config('mail.SMTP.setFrom.mail'), config('mail.SMTP.setFrom.name'));
            $mail->addAddress($emailAddress);

            //Content
            $mail->isHTML(config('mail.SMTP.HTML'));
            $mail->Subject = $subject;
            $mail->Body  = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = new Mail();
        return call_user_func_array(array($instance, $name), $arguments);
    }
}
