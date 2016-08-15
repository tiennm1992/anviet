<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('avatar');
		echo $this->Form->input('description');
		echo $this->Form->input('content');
		echo $this->Form->input('user_post_id');
		echo $this->Form->input('type');
		echo $this->Form->input('video');
		echo $this->Form->input('image');
		echo $this->Form->input('user_view');
		echo $this->Form->input('user_like');
		echo $this->Form->input('comment_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('created_datetime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
