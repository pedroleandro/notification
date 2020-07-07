<?php

require __DIR__ . "/vendor/autoload.php";

use Notification\Email\Email;

$newEmail = new Email();

$newEmail->send("Testando PHPMailer", "<p>Olá, Pedro!</p>",
                "developerfsphp@gmail.com", "teamdeveloper",
                "pedro.leandrog@gmail.com", "Pedro Leandro");

var_dump($newEmail);
