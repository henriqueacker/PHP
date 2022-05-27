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

  
    <div class="friends">
    <div> <span>Seguidores </span> </div>
        <?php foreach ($usuario->seguidores as $seguidores) : ?>
            <?php if (isset($seguidores)) : ?>
                <a href="<?= $base; ?>/perfil/<?= $seguidores->getId() ?>"> <?= $seguidores->getNome() ?></a>
                <a href="<?= $base; ?>/perfil/<?= $seguidores->getId() ?>"><img src="<?= $base; ?>/assets/<?= $seguidores->getAvatar() ?>" />
                <?php endif; ?>
            <?php endforeach; ?>
    </div>
           
    <div class="friends">
    <div> <span>Seguindo </span> </div>   
    <?php foreach($usuario->seguindo as $seguindo) : ?>
            <?php if (isset($seguindo)) : ?>
                <a href="<?= $base; ?>/perfil/<?= $seguindo->getId() ?>"> <?= $seguindo->getNome() ?></a>
                <a href="<?= $base; ?>/perfil/<?= $seguindo->getId() ?>"><img src="<?= $base; ?>/assets/<?= $seguindo->getAvatar() ?>" />
                <?php endif; ?>
            <?php endforeach; ?>
    </div>


</div>

<?= $render('footer', ['loggedUser' => $loggedUser]); ?>