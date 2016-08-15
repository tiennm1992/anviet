<?php
$option = array();
$option['title'] = 'Cac bai post';
$option['col'] = array(
    0 => array('key_tab' => 'id', 'title_tab' => 'STT', 'option_tab' => 'sort'),
    2 => array('key_tab' => 'title', 'title_tab' => 'Tiêu đề', 'option_tab' => 'sort'),
    3 => array('key_tab' => 'avatar', 'title_tab' => 'avatar', 'option_tab' => 'sort'),
    4 => array('key_tab' => 'avatar', 'title_tab' => 'image', 'option_tab' => 'sort'),
    5 => array('key_tab' => 'avatar', 'title_tab' => 'video', 'option_tab' => 'sort'),
    9 => array('key_tab' => '', 'title_tab' => 'option', 'option_tab' => ''),
);
echo $this->grid->create($posts, null, $option);
?>
<?php
foreach ($posts as $key => $post):
    ?>
    <tr>
        <td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
        <td ><?php echo h($post['Post']['title']); ?>&nbsp;</td>
        <td ><a target="_blank" href='<?php echo "https://www.facebook.com/" . $post['User']['face_id'] ?>'><img  style="width:120px;height: 100px " src="<?php echo $post['User']['avatar'] ?>"></a>&nbsp;</td>
        <td ><a target="_blank" href=''><img style="width:120px;height: 100px " src="<?php echo WEB_ROOT.'/'.$post['Post']['image'] ?>"></a>&nbsp;</td>
        <td>
            <video width="320" height="240" controls>
                <source src="<?php echo WEB_ROOT.'/'.$post['Post']['video'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </td>
        <td class="actions">
            <?php
            echo $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit icon-white', 'title' => 'Edit')), array('action' => 'edit', $post['Post']['id']), array('escape' => false, 'class' => 'btn btn-success btn-sm')
            ) . '&nbsp';
            echo $this->Form->postLink(
                    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove icon-white', 'title' => 'Delete')), array('action' => 'delete', $post['Post']['id']), array('escape' => false, 'class' => 'btn btn-danger btn-sm btn-cat-cancel'), __('Bạn có chắc muốn xóa', $post['Post']['id'])
            ) . '&nbsp';
            ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php echo $this->grid->end_table($posts, null, $option);
?>
