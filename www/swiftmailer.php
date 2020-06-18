<?php

require_once '../vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.mail.ru', '465', 'ssl'))
    ->setUsername('mail@mail.ru')
    ->setPassword('password');


$mailer = new Swift_Mailer($transport);

// Create the message
$message = (new Swift_Message())

    // Give the message a subject
    ->setSubject('Swiftmailer is here')

    // Set the From address with an associative array
    ->setFrom(['mail@mail.ru' => 'Name'])
    ->setTo(['gmail@gmail.com'])
    ->setBody('Here is the message itself')

    // And optionally an alternative body
    ->addPart('<q>Here is the message itself</q>', 'text/html')

    // Optionally add any attachments
    ->attach(Swift_Attachment::fromPath('index.php'));


// Send the message
$result = $mailer->send($message);

var_dump($result);
