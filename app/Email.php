<?php

namespace Notification\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    private $mail = \stdClass::class;

    public function __construct($smtpDebug, $host, $user, $password, $smtpSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        //Server settings
        $this->mail->SMTPDebug = $smtpDebug; //SMTP::DEBUG_SERVER;        // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host = $host; //'smtp.gmail.com';                    // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                     // Enable SMTP authentication
        $this->mail->Username = $user; //'developerfsphp@gmail.com';      // SMTP username
        $this->mail->Password = $password; //'9cPA8!Vhd3H*njBn';          // SMTP password
        $this->mail->SMTPSecure = $smtpSecure; //'tls';                   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port = $port; //587;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML(true);

        //Recipients
        //$this->mail->setFrom('developerfsphp@gmail.com', 'Team Developer');
        $this->mail->setFrom($setFromEmail, $setFromName);
    }

    public function send($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $exception) {
            echo "Erro ao enviar e-mail: {$this->mail->ErrorInfo} {$exception->getMessage()}";
        }
    }
}