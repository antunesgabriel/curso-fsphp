<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

use Source\Core\Mail;

/*
 * [ synthesize ]
 */

fullStackPHPClassSession("synthesize", __LINE__);

$mail = (new Mail())->bootstrap('Olá mundo!', '<h1>Hello World</h1><p>Essa é minha clase de envio de email</p>');

$image1 = __DIR__ . '/harry1.jpg';
$image2 = __DIR__ . '/harry2.jpg';

$mail->setAttachment($image1, 'Harry Potter1');
$mail->setAttachment($image2, 'Harry Potter2');

if ($mail->send('gabrielantunescontato@gmail.com', 'Gabriel Antunes')) {
    echo message()->success('Email enviado com sucesso!');
} else {
    echo $mail->getMessage();
}