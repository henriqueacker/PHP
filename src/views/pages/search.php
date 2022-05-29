<?= $render('header', ['loggedUser' => $loggedUser]); ?>
<?= $render('menu', ['loggedUser' => $loggedUser]); ?>
<div class="container">
    <div class="feed">
        <span> Você pesquisou por: <?= $search ?> </span>
        <div class="friends">
            <?php foreach ($usuarios as $usuario) : ?>
                <div>
                    <a href="<?= $base; ?>/perfil/<?= $usuario->getId() ?>"> <?= $usuario->getNome() ?></a>
                    <a href="<?= $base; ?>/perfil/<?= $usuario->getId() ?>"><img src="<?= $base; ?>/assets/<?= $usuario->getAvatar() ?>" />
                </div>

            <?php endforeach; ?>
        </div>

        <div class="friends">
            <?php foreach ($posts as $post) : ?>
                <div>       
                 <?= date('d/m/Y', strtotime($post->getDt_criacao())); ?>
                 <?= nl2br($post->getCorpo()) ?>
                </div>


            <?php endforeach; ?>
        </div>

    </div>
    <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
</div>