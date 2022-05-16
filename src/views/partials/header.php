<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$base?>/css/header.css" rel="stylesheet" type="text/css">
    
</head>
<body>
        <header>
        <div class="logo">
            <img src='<?=$base?>/assets/header.png'/>
        </div>
        
        <form method="get" action="<?=$base;?>/pesquisa">
        <input class='pesquisa' type='text' placeholder="Pesquisar" name='pesquisa' id='pesquisa' /> 
        </form>

        <p><?=$loggedUser->getNome(); ?></p>

        <img class="avatar" src="<?=$base;?>/assets/<?=$loggedUser->getAvatar();?>" />

        </header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/js/script.js" ></script>
 
</body>
</html>