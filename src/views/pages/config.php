<?= $render('header', ['loggedUser' => $loggedUser]); ?>
    <?= $render('menu', ['loggedUser' => $loggedUser]); ?>
    <div class="container">
        <div class="feed">
                <form method="POST" enctype="multipart/form-data"  action="<?=$base?>/configuracoes">

                    <input type="file" name="avatar"  value="<?=$base?>/assets/<?=$user->getAvatar()?>" />
                    <input type="file" name="capa"  value="<?=$base?>/assets/<?=$user->getCapa()?>" />
                    <input type="text" name="nome" value="<?=$user->getNome()?>"/>
                    <input type="text" name="dt_nascimento" value="<?=date('d/m/Y', strtotime($user->getDtnascimento()));?>"/>
                    <input type="text" name="cidade" value="<?=$user->getCidade()?>"/>
                    <input type="text" name="password"/>
                    <input type="text" name="passwordconfirm" />
                    <input type="submit" value="Salvar Alterações"/>
                </form>

        </div>
        <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
    </div>