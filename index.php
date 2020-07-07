<?php

require __DIR__."/vendor/autoload.php";

use Notification\Email\Email;

$newEmail = new Email();

$newEmail->send();
