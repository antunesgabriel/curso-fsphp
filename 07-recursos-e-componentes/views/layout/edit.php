<?php $v->layout('layout::base', ['title' => "Editando usuário {$user->first_name}"]); ?>

<?php $v->start('nav'); ?>
<a href="./"> Voltar </a>
<?php $v->stop(); ?>

<form name="post" action="./" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="text" name="firstName" value="<?= $user->first_name; ?>" />
    <input type="text" name="lastName" value="<?= $user->last_name; ?>" />
    <input type="text" name="email" value="<?= $user->email; ?>" />
    <input type="text" name="document" value="<?= $user->document; ?>" />
    <button type="submit">Salvar mudanças</button>
</form>
