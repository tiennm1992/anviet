<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('face_id');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('birth');
		echo $this->Form->input('avatar');
		echo $this->Form->input('address');
		echo $this->Form->input('status');
		echo $this->Form->input('created_datetime');
		echo $this->Form->input('last_login');
		echo $this->Form->input('level');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
