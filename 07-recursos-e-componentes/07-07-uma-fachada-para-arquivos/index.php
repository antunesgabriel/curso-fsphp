<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.07 - Uma fachada para arquivos");

require __DIR__ . "/../vendor/autoload.php";

use Source\Support\Upload;

/*
 * [ image ] Fachada para envio de imagens (jpg, png, gif)
 */
fullStackPHPClassSession("image", __LINE__);

var_dump(gd_info());

$upload = new Upload();


$formSend = "image";
require __DIR__ . "/form.php";

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post && $post['send'] === $formSend) {
    $image = $_FILES['file'];
    $name = $post['name'];

    $path = $upload->image($image, $name, 500);

    if ($path) {
        echo message()->success('Imagem enviada com succeso');
        echo "<img src='{$path}' alt='{$name}' width='100%' />";
    } else {
        echo $upload->message();
    }
}


/*
 * [ file ] Fachada para envio de arquivos (pdf, docx, zip, etc)
 */
fullStackPHPClassSession("file", __LINE__);


$formSend = "file";
require __DIR__ . "/form.php";

if($post && $post['send'] === $formSend) {
    $file = $_FILES['file'];
    $name = $post['name'];

    $path = $upload->file($file, $name);

    if ($path) {
        echo message()->success('Arquivo enviado com succeso');
        echo "<a href='{$path}' target='_blank'>Ver arquivo</a>";
    } else {
        echo $upload->message();
    }
}


/*
 * [ media ] Fachada para envio de midias (audio/video)
 */
fullStackPHPClassSession("media", __LINE__);


$formSend = "media";
require __DIR__ . "/form.php";

if($post && $post['send'] === $formSend) {
    $media = $_FILES['file'];
    $name = $post['name'];

    var_dump($media);

    $path = $upload->media($media, $name);

    if ($path) {
        echo message()->success('Arquivo enviado com succeso');
        echo "<a href='{$path}' target='_blank'>Ver media</a>";
    } else {
        echo $upload->message();
    }
}


/*
 * [ remove ] Um método adicional
 */
fullStackPHPClassSession("remove", __LINE__);
