
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
  