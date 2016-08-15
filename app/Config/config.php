<?php

$config['project_title'] = "Norina";
$config['version'] = '1.0';
$base_folder = '@' . str_replace(APP_DIR . '/' . WEBROOT_DIR . '/' . 'index.php', '', $_SERVER['PHP_SELF']);
$base_folder = str_replace('@/', '', $base_folder);
define('BASE_URL', Router::url('/', true) . $base_folder);

// upload config dir
$config['image_dir'] = WWW_ROOT . 'uploads/images/';
$config['banner_dir'] = WWW_ROOT . 'uploads/images/banner/';
$config['campaign_image_dir'] = WWW_ROOT . 'uploads/images/campaign_image/';

$config['image_url'] = 'uploads/images/';
$config['image_default'] = BASE_URL . 'uploads/images/default.jpg';

//openfire
$config['openfire']['server'] = '52.196.127.150';

$config['openfire']['port'] = 5222;
$config['openfire']['admin_id'] = '0';

$config['support_email'] = array(
    'forget_password' => 'support@norina.jp',
    'cancel_trip' => 'support@norina.jp',
    'qa' => 'support@norina.jp');

define('LOGIN_EXPIRED', 60 * 60 * 24 * 30); //30 days
define('CODE_EXPIRED', 1800);
define('PASSENGER', 1);
define('DRIVER', 2);
define('SEX_MALE', 0);
define('SEX_FEMALE', 1);

$config['left_menu'] = array(
//    array(
//        'icon' => 'fa fa-bar-chart-o',
//        'title' => 'Home',
//        'url' => 'home/',
//        'childrens' => false
//    ),
    array(
        'icon' => 'fa fa-dashboard',
        'title' => 'Campaign management',
        'url' => 'campaign',
        'childrens' => false
    ),
//    array(
//        'icon' => 'fa fa-th',
//        'title' => 'Admin',
//        'url' => 'admin',
//        'childrens' => false
//    ),
    array(
        'icon' => 'fa fa-user',
        'title' => 'User management',
        'url' => 'user',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-table',
        'title' => 'Trip management',
        'url' => 'trip',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-calendar',
        'title' => 'Payment management',
        'url' => 'transaction/index',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-edit',
        'title' => 'Cancel management',
        'url' => 'cancel/index',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-share',
        'title' => 'Send notification',
        'url' => 'cancel/in_push',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-th',
        'title' => 'Claim management',
        'url' => 'claim/index',
        'childrens' => false
    ),
    array(
        'icon' => 'fa fa-book',
        'title' => 'Sql statement',
        'url' => 'sql/index',
        'childrens' => false
    ),
);
$config['gg_maps_api'] = [
    'language' => 'ja',
    'region' => 'JP',
    'secret_key' => 'AIzaSyAxTY741XPmx0nCXaU74nOm5U5VFsp84mY',
    'url' => 'https://maps.googleapis.com/maps/api/directions/json'
];

define('WEB_ROOT', 'http://demo.aphimdayroi.com');
define('APP_ID', '121940961581141');
define('SECRET', '91219fa2c760ae219b15d0d9b097dbf7');








