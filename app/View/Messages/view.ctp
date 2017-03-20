<div class="users view">
	<table>
	<?php foreach ($messages as $message): ?>
		<?php if($message['Message']['from_id'] == AuthComponent::user('id')): ?>
		<tr>
			
			<td><?php echo h($message['Message']['content']); ?>&nbsp;</td>
			<td rowspan="2"><img src="dfgdegf.jpg"></td>
		</tr>
		<tr>
			<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		</tr>
	<?php else: ?>
		<tr>
			<td rowspan="2"><img src="dfgdegf.jpg"></td>
			<td><?php echo h($message['Message']['content']); ?>&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		</tr>
	<?php endif ?>
	<?php endforeach; ?>	
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?> </li>
	</ul>
</div>