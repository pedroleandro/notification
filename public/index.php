<?php

require __DIR__ . "/../vendor/autoload.php";

use Notification\Email\Email;

$newEmail = new Email(2, 'smtp.gmail.com', 'developerfsphp@gmail.com', '9cPA8!Vhd3H*njBn',
    'tls', 587, 'developerfsphp@gmail.com', 'Team Developer');

$newEmail->send("Testando PHPMailer", "<p>Olá, Pedro!</p>",
                "developerfsphp@gmail.com", "teamdeveloper",
                "pedro.leandrog@gmail.com", "Pedro Leandro");

var_dump($newEmail);
