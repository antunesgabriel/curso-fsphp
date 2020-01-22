<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.10 - Paginador de resultados");

require __DIR__ . "/../vendor/autoload.php";

use Source\Support\Pager;

/*
 * [ paginator ] https://packagist.org/packages/coffeecode/paginator
 */

fullStackPHPClassSession("paginator", __LINE__);

$current = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

$paginator = new Pager('?page=');

$paginator->pager(60, 10, $current, 2);

$pages = $paginator->render();


echo $pages;