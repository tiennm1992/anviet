<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Pokemon">
        <meta name="author" content="Pokemon">
        <meta property="fb:app_id" content="<?php echo APP_ID ?>" />
        <!--<title><?php echo $this->fetch('title'); ?></title>-->
        <?php echo $this->Html->meta('icon'); ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <!-- start: CSS -->
        <?php echo $this->Html->css('AdminLTE'); ?>
        <?php echo $this->Html->css('_all-skins.min'); ?>
        <?php echo $this->Html->css('amain'); ?>
        <?php echo $this->Html->css('add_style'); ?>
        <?php echo $this->fetch('css'); ?>


        <!-- jQuery 2.1.3 -->
        <?php echo $this->Html->script('jQuery-2.1.3.min'); ?>
    </head>
    <body>
        <header>
            <nav id='cssmenu'>
                <div class="logo"><a href="/">Pokemon Go </a></div>
                <div id="head-mobile"></div>
                <div class="button"></div>
                <ul>
                    <li class='active'><a href='#'>HOME</a></li>
                    <li><a href='/'>NEW</a></li>
                    <li><a href='/'>HOT</a>
                        <!--                        <ul>
                                                    <li><a href='#'>Product 1</a>
                                                        <ul>
                                                            <li><a href='#'>Sub Product</a></li>
                                                            <li><a href='#'>Sub Product</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href='#'>Product 2</a>
                                                        <ul>
                                                            <li><a href='#'>Sub Product</a></li>
                                                            <li><a href='#'>Sub Product</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>-->
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href='/client/add_post'>UPLOAD POST</a></li>
                    <?php endif; ?>
                    <li><a href='#'>VIDEO</a></li>
                    <li><a href='/client/login'>LOGIN</a></li>
                </ul>
            </nav>
        </header>
        <section style="margin-top: 10px">
            <?php echo $this->fetch('content'); ?>
        </section>
    </body>

</html>