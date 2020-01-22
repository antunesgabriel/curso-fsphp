<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require __DIR__ . '/../vendor/autoload.php';

    use Source\Support\SEO;

    $seo = new SEO();
    $optimized = $seo->render(
        'Gabriel Antunes - Desenvolvedor Web e Mobile FullStack',
        'Criação de sistemas, site para web e aplicativos',
        CONF_URL_BASE,
        CONF_UPLOAD_DIR . '/' . CONF_UPLOAD_IMAGE_FOLDER . '/2020/01/tretr.jpg'
    );

    echo $optimized;
    ?>
</head>

<body>
    <h1><?= $seo->title; ?></h1>
    <h2><?= $seo->description; ?></h2>
</body>

</html>