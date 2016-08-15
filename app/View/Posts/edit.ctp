<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
