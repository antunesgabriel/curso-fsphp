<?php
ob_start();
require __DIR__ . "/../vendor/autoload.php";

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.06 - Uma camada de visualização");


/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

// use League\Plates\Engine;

// $plates = Engine::create(__DIR__ . '/../views', 'php');

// $plates->addFolder('layout', 'layout');

// if (empty($_GET['id'])) {
//     $users = user()->all(5);

//     echo $plates->render('layout::list', [
//         'title' => 'Lista de usuarios',
//         'list' => $users
//     ]);
// } else {
//     $id = $_GET['id'];
//     $user = user()->findById($id);

//     echo $plates->render('layout::edit', [
//         'title' => 'Editar usuário do sistema',
//         'user' => $user
//     ]);
// }


/*
 * [ synthesize ] Sintetizando rotina e abstraíndo o recurso (componente)
 */
fullStackPHPClassSession("synthesize", __LINE__);

use Source\Core\View;

$view = new View();

$view->addFolder('layout', 'layout');

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

if ($post) {
    $post = (object) $post;
    $message = message();
    $message->success("Usuario {$post->firstName} editado!");
    $message->flash();

    redirect('./');
} else if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = user()->findById($id);

    echo $view->render('layout::edit', [
        'title' => 'Editar usuário',
        'user' => $user
    ]);
} else {
    $users = user()->all(5);

    echo $view->render('layout::list', [
        'title' => 'Lista de usuarios do sistema',
        'list' => $users
    ]);
}

ob_end_flush();