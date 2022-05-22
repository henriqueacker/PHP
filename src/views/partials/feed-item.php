<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $base ?>/css/feed-item.css" rel="stylesheet" type="text/css">
    <link href="<?= $base ?>/css/geral.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="perfil">
                <img src="<?= $base ?>/assets/<?= $data->user->getAvatar() ?>" />
                <span> <?= $data->user->getNome() ?></span>
                <?php

                switch ($data->getTipo()) {
                    case 'text':
                        echo 'fez um post em';
                        break;
                }
                ?>
                <?= date('d/m/Y', strtotime($data->getDt_criacao())); ?>
            </div>

            <div class="body-post">
                <?= nl2br($data->getCorpo()) ?>
            </div>
            <div class="likes">
            <span> Curtidas: <?= $data->likeCount ?></span>
            <span> Comentarios:<?= count($data->comments); ?> </span>
            </div>
        </div>
       


</body>

</html>