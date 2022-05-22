<div class="header">
        <?= $render('header', ['loggedUser' => $loggedUser]); ?>
    </div>

    <div class="menu">
        <?= $render('menu', ['loggedUser' => $loggedUser]); ?>
    </div>

   
    
    <?= $render('footer', ['loggedUser' => $loggedUser]); ?>