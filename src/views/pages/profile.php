<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

        <?= $render('feed-editor', ['loggedUser' => $loggedUser]); ?>

        <?php foreach($feed['posts'] as $feedItem): ?>
            <?= $render('feed-item', [
                'data' => $feedItem,
                'loggedUser' => $loggedUser
                
                ]); ?>
        <?php endforeach; ?>

     
        <?php for($i = 0; $i<$feed['totalPost']; $i++): ?>
            <a class="<?=($i ==$feed['currentPage'])? 'active': '' ?>" href="<?=$base;?>/?page=<?=$i;?>"> <?=$i+1;?></a>
        <?php endfor; ?>
     
  
    </div>

    <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
</body>
</html>