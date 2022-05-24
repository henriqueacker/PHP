
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
