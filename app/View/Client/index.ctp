<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <?php foreach ($posts as $key => $value): $post = $value['Post'] ?>
                <div class="col-lg-8">
                    <a href="/client/detail/<?php echo $post['id'] ?>">
                        <?php if ($value['Post']['type'] == 1) { ?>
                            <img style="width: 100%" src="<?php echo WEB_ROOT . '/' . $post['image'] ?>">
                        <?php } else { ?>
                            <video width="100%"  poster="<?php echo WEB_ROOT . '/' . $post['avatar'] ?>">
                                <source src="<?php echo WEB_ROOT . '/' . $post['video'] ?>" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h3><?php echo $post['title']; ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?php echo $value['User']['avatar'] ?>" style="width: 100%">
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $value['User']['full_name'] ?></h4>
                        </div>
                    </div>
                    <div style="padding-top: 10px;">
                        <span>
                            <i class="glyphicon glyphicon-eye-open" style="padding: 5px;"></i><?php echo $value['Post']['user_view'] ?>
                            <i class="glyphicon glyphicon-thumbs-up" style="padding: 5px;"></i><?php echo $value['Post']['user_like'] ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>