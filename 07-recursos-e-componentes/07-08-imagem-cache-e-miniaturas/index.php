<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

use Source\Support\Cache;

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$cache = new Cache();

// echo "<img src='{$cache->make('image/2020/01/eu.jpg', 200)}' />";


$cache->flush('image/2020/01/eu.jpg');

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);