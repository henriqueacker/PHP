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
    
        <?= $render('feed-editor', ['loggedUser' => $loggedUser]); ?>
        
        <?= $render('feed-item', ['loggedUser' => $loggedUser]); ?>
    </div>




</body>

</html>