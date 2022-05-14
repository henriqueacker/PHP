<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$base?>/css/header.css" rel="stylesheet" type="text/css">
    
</head>
<body>
        <div class="header">
        <img src='<?=$base?>/assets/header.png' height="40" width="40"/>
        <p>Community X</p>
        <form method="get" action="<?=$base;?>/pesquisa"><input class='pesquisa' type='search' value="Pesquisar" name='pesquisa' /> </form>
        <p><?=$loggedUser->getNome(); ?></p>
        <img src="<?=$base;?>/assets/<?=$loggedUser->getAvatar();?>" />
        </div>
        

</body>
</html>