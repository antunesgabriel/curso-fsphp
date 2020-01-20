<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\SMTP;

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */

fullStackPHPClassSession("instance", __LINE__);

$testMailer = new PHPMailer();

var_dump($testMailer instanceof PHPMailer);


/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    $mail = new PHPMailer(true);

    # Mail config
    $mail->isSMTP();
    $mail->setLanguage('br');
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet = 'utf-8';
    $mail->isHTML(true);

    # Mail server
    $mail->Host = 'smtp.sendgrid.net';
    $mail->Username = 'apikey';
    $mail->Password = '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';
    $mail->Port = 587;

    # Destinatary
    $mail->setFrom('gabrielantunescontato@gmail.com', 'Antunes');
    $mail->addAddress('gabrielantunescontato@gmail.com', 'Antunes');


    # Content
    $mail->Subject = 'Meu primeiro envio de email com php';
    $mail->Body = '<h1>Titulo</h1><p>Teste de paragrafo</p>';

    # Função que faz o envio do email;
    # $mail->send();

    echo message()->success('Email enviado com succeso');
} catch (MailerException $exception) {
    var_dump($exception);
    message()->error($exception->getMessage());
}