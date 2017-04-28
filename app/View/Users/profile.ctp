<div class="row">
	<div class="col-md-4 text-center">
		<img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
			display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">
				<h1 class="only-bottom-margin"><?= h($user['User']['name'].' '.$yourage) ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<span class="text-muted">Email:</span> <?= h($user['User']['email']) ?><br>
				<span class="text-muted">Birth date:</span> <?= h($user['User']['birthdate']) ?><br>
				<span class="text-muted">Gender:</span> <?= h($user['User']['gender'] != '' ? ($user['User']['gender'] == 'M' ? "Male" : "Female") : '') ?><br><br>
				<span class="text-muted">Hobby</span><br> <?= h($user['User']['hubby']) ?><br><br>
				<small class="text-muted">Created: <?= h($user['User']['created']) ?></small><br>
				<small class="text-muted">Last Login: <?= h($user['User']['last_login_time']) ?></small>
			</div>
			<div class="col-md-6">
				<div class="activity-mini">
					<i class="glyphicon glyphicon-comment text-muted"></i>Comments: 500
				</div>
				<div class="activity-mini">
					<i class="glyphicon glyphicon-thumbs-up text-muted"></i>Likes: 1500
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
		<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary')); ?>
	</div>
</div>
