<?php echo $this->Session->flash(); ?>
<script src="<?php echo $this->webroot ?>ckeditor/ckeditor.js"></script>
<div style="width: 100%">
    <div class="products form">
        <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Thêm bài viết'); ?></legend>
            <?php
//            echo $this->Form->input('id');
            ?>
            <div class="form-group">
                <label for="PostAvatar" class="control-label col-xs-12 col-sm-2">Tiêu đề</label>
                <div class="controls col-xs-12 col-sm-8">
                    <input type="text" name="data[Post][title]"  class="form-control" id="PostAvatar"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label for="PostAvatar" class="control-label col-xs-12 col-sm-2">Nội dung</label>
                <div class="controls col-xs-12 col-sm-8">
                    <input type="file" name="data[Post][content]"  class="form-control" id="PostAvatar"/>
                </div>
                <div class="clearfix"></div>
            </div>
        </fieldset>
        <?php echo $this->Form->end(__('Tạo mới')); ?>
    </div>
</div>
<!--<script>
    $("#PostAddPostForm").submit(function (e) {
        var url = "/client/add_ajax"; // the script where you handle the form input.
        $.ajax({
            type: "POST",
            url: url,
            data: $("#PostAddPostForm").serialize(), // serializes the form's elements.
            success: function (data)
            {
                if (data == 'done') {
                    document.location.href = '<?php // echo $this->Session->read('back')    ?>'
                } else {
                    alert(data); // show response from the php script.
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>-->
