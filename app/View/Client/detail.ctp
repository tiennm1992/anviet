<style>
    .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style], .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
    {
        width: 100% !important;
    }
</style>
<div class="container">
    <div class="row">
        <img style="width: 100%" src="<?php echo WEB_ROOT . '/' . $post['avatar'] ?>">
    </div>
    <div class="row">
        <h3><?php echo $post['title']; ?></h3>
    </div>
    <div id="fb-root"></div>
    <div class="row">
        <div class="fb-comments"
             data-href="<?php echo WEB_ROOT . '/detail/' . $post_id ?>"
             data-numposts="10"
             data-width="100%"
             data-colorscheme="light"></div>
        <!--<fb:comments href="<?php // echo WEB_ROOT . '/detail/' . $post_id ?>" colorscheme="light" numposts="10"></fb:comments>-->
    </div>

</div>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=121940961581141";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>