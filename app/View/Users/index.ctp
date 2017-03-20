<div class="users index">
	<h2><?php echo __('WELCOME TO YOUR HOME'); ?></h2>
	<?php 
	?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Profile'), array('action' => 'profile', AuthComponent::user('id'))); ?></li>
		<li><?php echo $this->Html->link(__('Messages'), array('controller' => 'messages', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>
