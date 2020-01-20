<?php $v->layout('layout::base'); ?>

<?= session()->flash(); ?>

<?php foreach ($list as $user) : ?>
<article>
    <h1><?= "{$user->first_name} {$user->last_name}"; ?></h1>
    <p>Email: <?= $user->email; ?></p>
    <p>Data de cadastro: <?= date_fmt_br($user->created_at); ?></p>
    <p>Document: <?= $user->document ?? ''; ?></p>
    <a href="?id=<?= $user->id; ?>">Editar</a>
</article>
<?php endforeach; ?>
