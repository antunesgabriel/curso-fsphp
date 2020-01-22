<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

use Source\Support\SEO;

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */

fullStackPHPClassSession("optimizer", __LINE__);

$seo = new SEO();

$optmizeSEO = $seo->render(
    'Gabriel Antunes - Desenvolvedor Web e Mobile FullStack',
    'Criação de sistemas, site para web e aplicativos',
    CONF_URL_BASE,
    CONF_UPLOAD_DIR . '/' . CONF_UPLOAD_IMAGE_FOLDER . '/2020/01/tretr.jpg'
);

var_dump($optmizeSEO);