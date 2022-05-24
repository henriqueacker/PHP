    <?= $render('header', ['loggedUser' => $loggedUser]); ?>
    <?= $render('menu', ['loggedUser' => $loggedUser]); ?>
    <div class="container">
        <div class="feed">
            <?= $render('feed-editor', ['loggedUser' => $loggedUser]); ?>

            <?php foreach ($feed['posts'] as $feedItem) : ?>
                <?= $render('feed-item', [
                    'data' => $feedItem,
                    'loggedUser' => $loggedUser

                ]); ?>
            <?php endforeach; ?>

            <div class="feed-pagination">
                <?php for ($i = 0; $i < $feed['totalPost']; $i++) : ?>
                    <a class="<?= ($i == $feed['currentPage']) ? 'active' : '' ?>" href="<?= $base; ?>/?page=<?= $i; ?>"> <?= $i + 1; ?></a>
                <?php endfor; ?>
            </div>

        </div>
        <?= $render('footer', ['loggedUser' => $loggedUser]); ?>
    </div>