<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<a class="fb-share-button"
     data-href="http://lemma-auto.ru/auto-magazine/posts/{{ $post->slug }}"
     data-layout="button_count">
</a>

<?php

function showSharer($url, $message){
    //powered by https://sharingbuttons.io/
    ?>
    <a class="resp-sharing-button__link" href="whatsapp://send?text=<?php echo urlencode($message) ?>%20
            <?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="SПоделиться на WhatsApp">
        <img src="/img/social_icons/whatsapp.png" width="30px" alt="Поделиться на WhatsApp">
    </a>

    <a class="resp-sharing-button__link" href="https://vk.com/share.php?url=<?php echo urlencode($url) ?>" 
            target="_blank" rel="noopener" aria-label="Share on VKontakte">
        <img src="/img/social_icons/vkontakte.jpg" width="30px" alt="Поделиться на VKontakte">
    </a>
    
    <a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=<?php echo urlencode($message) ?>
            &amp;url=<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on Telegram">
        <img src="/img/social_icons/telegram.png" width="30px" alt="Поделиться в Telegram">
    </a>
    <?php
}
