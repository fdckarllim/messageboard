<div class="users view">
	<table>
	<?php foreach ($messages as $message): ?>
		<?php $convolist = array(); ?>
		<?php if($message['Message']['from_id'] == AuthComponent::user('id')): ?>
			<?php $convolist[] =  in_array($message['Message']['from_id'], $convolist) ? '' : $message['Message']['from_id'];?>
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
