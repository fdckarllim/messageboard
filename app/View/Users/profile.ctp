<div class="users view">
<h2><?php echo __('User Profile'); ?></h2>

 	<table class=''>
		<tr>
			<td style="width: 210px;">
				<img style="max-width: 200px;" src="<?= $this->webroot; ?>app/webroot/uploads/kaaru.jpg">
			</td>
			<td>
				<table>
					<tr>
						<td><h2><?= h($user['User']['name']." 19") ?></h2></td>
					</tr>
					<tr>
						<td>Gender: <?= h($user['User']['gender'] != '' ? ($user['User']['gender'] == 'M' ? "Male" : "Female") : '') ?></td>
					</tr>
					<tr>
						<td>Birthdate: <?= h($user['User']['birthdate']) ?></td>
					</tr>
					<tr>
						<td>Joined: <?= h($user['User']['created']) ?></td>
					</tr>
					<tr>
						<td>Last Login: : <?= h($user['User']['last_login_time']) ?></td>
					</tr>
				</table>
 			</td>
		</tr>
		<tr>
			<td colspan="2">
				<p>Hobby</p>
				<?= h($user['User']['hubby']) ?>
			</td>
		</tr>
 	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Messages'), array('action' => 'add')); ?> </li>
	</ul>
</div>
