<?php
$urls = array(
    //quan ly app
    'posts' => $this->Html->url(array('controller' => 'admin', 'action' => 'post_list', 'admin' => true), true),
    'user_list' => $this->Html->url(array('controller' => 'admin', 'action' => 'user_list', 'admin' => true), true),
);
?>

<ul class="sidebar-menu">
    <!--quản lý sản phẩm-->
    <li class="header"><i class="fa fa-square"></i> <span>Quản lý ứng dụng</span></li>
    <li><a href="<?php echo $urls['posts']; ?>" ><i class="fa fa-angle-double-right"></i> <span>Quản lý bài viết</span></a></li>
    <!--Quản lý category-->
    <li class="header"><i class="fa fa-square"></i> <span>Quản lý user</span></li>
    <li><a href="<?php echo $urls['user_list']; ?>"><i class="fa fa-angle-double-right"></i> <span>Danh sách user</span></a></li>
</ul>
