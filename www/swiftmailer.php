<?php

require_once '../vendor/autoload.php';
require '../config.php';

$transport = (new Swift_SmtpTransport('', '465', 'ssl'))
    ->setUsername(SET_USER_NAME)
    ->setPassword(SET_PASSWORD);


$mailer = new Swift_Mailer($transport);

// Create the message
$message = (new Swift_Message())

    // Give the message a subject
    ->setSubject('Swiftmailer is here')

    // Set the From address with an associative array
    ->setFrom([SET_FROM => NAME])
    ->setTo([SET_TO])
    ->setBody('Here is the message itself')

    // And optionally an alternative body
    ->addPart('<q>Here is the message itself</q>', 'text/html')

    // Optionally add any attachments
    ->attach(Swift_Attachment::fromPath('index.php'));


// Send the message
$result = $mailer->send($message);

var_dump($result);
