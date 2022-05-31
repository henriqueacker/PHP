<?= $render('header', ['loggedUser' => $loggedUser]); ?>
<?= $render('menu', ['loggedUser' => $loggedUser]); ?>
<div class="container">
    <div class="feed">
        <div class="config">
            <form method="POST" enctype="multipart/form-data" action="<?= $base ?>/configuracoes">
            <div class="message">
                <?php if(!empty($message)): ?>
                    <?php echo $message ?>
                <?php endif;?>
             </div>
                <div class="field2">
                    <label>Avatar:</label>
                    <input type="file" name="avatar" value="<?= $base ?>/assets/<?= $user->getAvatar(); ?>" />
                </div>

                <div class="field2">
                    <label>Capa:</label>
                    <input type="file" name="capa" value="<?= $base ?>/assets/<?= $user->getCapa(); ?>" />
                </div>

                <div class="field2">
                    <label>Nome:</label>
                    <input type="text" name="nome" value="<?= $user->getNome(); ?>" />
                </div>

                <div class="field2">
                    <label>Data de Nascimento:</label>
                    <input type="text" name="dt_nascimento" value="<?= date('d/m/Y', strtotime($user->getDtnascimento())); ?>" />
                </div>

                <div class="field2">
                    <label>Cidade:</label>
                    <input type="text" name="cidade" value="<?= $user->getCidade(); ?>" />
                </div>

                <div class="field2">
                    <label>Nova Senha:</label>
                    <input type="text" name="password" />
                </div>

                <div class="field2">
                    <label>Confirmar Senha:</label>
                    <input type="text" name="passwordconfirm" />
                </div>

                <div class="field2">
                    <input class="btn-edit" type="submit" value="Salvar Alterações" />
                </div>
            </form>
        </div>
    </div>
    <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
</div>