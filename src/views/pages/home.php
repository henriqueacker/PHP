<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $base ?>/css/home.css" rel="stylesheet" type="text/css">
    <link href="<?= $base ?>/css/geral.css" rel="stylesheet" type="text/css">
    <title>Community X</title>
</head>

<body>
    <div class="header">
        <?= $render('header', ['loggedUser' => $loggedUser]); ?>
    </div>

    <div class="menu">
        <?= $render('menu', ['loggedUser' => $loggedUser]); ?>
    </div>

    <div class="feed">
        <?= $render('feed-editor', ['loggedUser' => $loggedUser]); ?>

        <?php foreach($feed['posts'] as $feedItem): ?>
            <?= $render('feed-item', [
                'data' => $feedItem,
                'loggedUser' => $loggedUser
                
                ]); ?>
        <?php endforeach; ?>

        <div class="feed-pagination">
        <?php for($i = 0; $i<$feed['totalPost']; $i++): ?>
            <a class="<?=($i ==$feed['currentPage'])? 'active': '' ?>" href="<?=$base;?>/?page=<?=$i;?>"> <?=$i+1;?></a>
        <?php endfor; ?>
        </div>
        <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
    </div>
    
</body>

</html>