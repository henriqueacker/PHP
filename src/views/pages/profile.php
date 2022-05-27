<?= $render('header', ['loggedUser' => $loggedUser]); ?>

<?= $render('menu', ['loggedUser' => $loggedUser]); ?>
<div class="container">




    <img src="<?= $base; ?>/assets/<?= $usuario->getCapa(); ?>" />
    <span><?= $usuario->getNome(); ?> </span>

    <?php if (!empty($usuario->getCidade())) : ?>
        <span> <?= $usuario->getCidade(); ?> </span>
    <?php endif; ?>

    <?php if (!empty($usuario->getDtnascimento())) : ?>
        <span> <?= date('d/mY', strtotime($usuario->getDtnascimento())); ?> </span>
    <?php endif; ?>

    <?php if ($usuario->getId() != $loggedUser->getId()) : ?>

        <a href="<?= $base; ?>/perfil/<?= $usuario->getId(); ?>/follow" class="button"><?= (!$isFollowing) ? 'Follow' : 'Unfollow'; ?></a>

    <?php endif; ?>

    <span> Seguidores: <?= count($usuario->seguidores) ?> </span>
    <span> Seguindo: <?= count($usuario->seguindo) ?> </span>
    
    <a href="<?= $base; ?>/perfil/<?=$usuario->getId()?>/amigos">Ver Todos</a>
    <div class="friends">
     
        <?php for ($q = 0; $q < 9; $q++) : ?>
            <?php if (isset($usuario->seguidores[$q])) : ?>
                <a href="<?= $base; ?>/perfil/<?= $usuario->seguidores[$q]->getId() ?>"> <?= $usuario->seguidores[$q]->getNome() ?></a>
                <a href="<?= $base; ?>/perfil/<?= $usuario->seguidores[$q]->getId() ?>"><img src="<?= $base; ?>/assets/<?= $usuario->seguidores[$q]->getAvatar() ?>" />
                <?php endif; ?>
            <?php endfor; ?>
    </div>

 
        <?= $render('feed-editor', ['loggedUser' => $loggedUser]); ?>

        <?php foreach ($feed['posts'] as $feedItem) : ?>
            <?= $render('feed-item', [
                'data' => $feedItem,
                'loggedUser' => $loggedUser

            ]); ?>
        <?php endforeach; ?>

        <div class="feed-pagination">
            <?php for ($i = 0; $i < $feed['totalPost']; $i++) : ?>
                <a class="<?= ($i == $feed['currentPage']) ? 'active' : '' ?>" href="<?= $base; ?>/perfil/<?= $loggedUser->getId() ?>?page=<?= $i; ?>"> <?= $i + 1; ?></a>
            <?php endfor; ?>
        </div>

</div>

<?= $render('footer', ['loggedUser' => $loggedUser]); ?>