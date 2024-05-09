<?php

namespace ImmoDemo\Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->setup();
    }

    private function setup() {
        $this->mail->isSMTP();
        $this->mail->Host = 'localhost';
        $this->mail->SMTPAuth = false;
        $this->mail->Port = 1025;
    }

    public function sendEmailWithXml($recipientEmail, $subject, $body, $xmlString, $docName) {
        try {
            $this->mail->setFrom('auto@anfrage.com', 'Mailer');
            $this->mail->addAddress($recipientEmail);

            $this->mail->addStringAttachment($xmlString, $docName);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = strip_tags($body);

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}