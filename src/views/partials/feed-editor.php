<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$base?>/css/feed-editor.css" rel="stylesheet" type="text/css">
    <link href="<?=$base?>/css/geral.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="feed-editor">
    <img class="avatar2" src="<?=$base;?>/assets/<?=$loggedUser->getAvatar();?>" />
        <form method="POST" >
            
            <input class="send-post" type="text" name="feed" placeholder="Digite um post"/>
             
        </form>
    </div>
</body>
</html>