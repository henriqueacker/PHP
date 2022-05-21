<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$base?>/css/feed-item.css" rel="stylesheet" type="text/css">
    <link href="<?=$base?>/css/geral.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <img src="<?=$base ?>/assets/<?=$data->user->getAvatar()?>" />
            <?=$data->user->getNome() ?>
            <?php

            switch($data->getTipo()){
                case 'text':
                    echo 'fez um post';
                break;                    
            }
            ?>
            <?=date('d/m/Y', strtotime($data->getDt_criacao()));?>
            <?=nl2br($data->getCorpo()) ?>

            <span> Curtidas: </span><?=$data->likeCount ?>
            <span> Comentarios: </span><?=count($data->comments); ?>
    </div>
</body>
</html>