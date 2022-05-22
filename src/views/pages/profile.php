    <div class="header">
        <?= $render('header', ['loggedUser' => $loggedUser]); ?>
    </div>

    <div class="menu">
        <?= $render('menu', ['loggedUser' => $loggedUser]); ?>
    </div>

   <img src="<?=$base;?>/assets/<?=$usuario->getCapa(); ?>" />
   <span><?=$usuario->getNome(); ?> </span>
    
    <?php if(!empty($usuario->getCidade())): ?>
        <span> <?=$usuario->getCidade();?> </span>
    <?php endif; ?>

    <?php if(!empty($usuario->getDtnascimento())): ?>
        <span> <?=date('d/mY',strtotime($usuario->getDtnascimento()));?> </span>
    <?php endif; ?>

    <span> Seguidores: <?=count($usuario->seguidores)?> </span>
    <span> Seguindo: <?=count($usuario->seguindo)?> </span>



    <?php for($q = 0; $q<9; $q++): ?>
        <?php if(isset($usuario->seguidores[$q])): ?>
            <span><?=$usuario->seguidores[$q]->getId()?></span:>
        <?php endif; ?>    
    <?php endfor; ?>


    <?= $render('footer', ['loggedUser' => $loggedUser]); ?>