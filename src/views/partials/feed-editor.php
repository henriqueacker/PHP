<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= $base ?>/css/feed-editor.css" rel="stylesheet" type="text/css">
    <link href="<?= $base ?>/css/geral.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="feed-editor">
        <img class="avatar2" src="<?= $base; ?>/assets/<?= $loggedUser->getAvatar(); ?>" />

        <div class='feed-new' contenteditable="true">


        </div>
        <div class="feed-new-send">
            <img src="<?= $base; ?>/assets/icons/send.png" class="send" />
        </div>

        <form class="send-feed" method="POST" action="<?= $base ?>/post/new">
            <input type="hidden" name="body" />
        </form>

    </div>
    <script type="text/javascript">
        let feedInput = document.querySelector('.feed-new');
        let feedSubmit = document.querySelector('.feed-new-send');
        let feedForm = document.querySelector('.send-feed');

        feedSubmit.addEventListener('click', function(obj) {
            let value = feedInput.innerText;

            if (value != '') {
                feedForm.querySelector('input[name="body"]').value = value;
                feedForm.submit();
            }
        })
    </script>
</body>

</html>