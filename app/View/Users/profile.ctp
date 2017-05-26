<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
			display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?= h($user['User']['name']) ?>
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="<?php echo $this->Html->url('/users/edit/'.AuthComponent::user('id')); ?>">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
		   		<div class="row">
					<div class="col-md-12">
						<h1 class="only-bottom-margin">Personal Information</h1>
					</div>
				</div><hr>
				<div class="row">
					<div class="col-md-6">
					<fieldset>
						
						<span class="text-muted">Email:</span> <?= h($user['User']['email']) ?><br>
						<span class="text-muted">Birth date:</span> <?=	h(date_format(date_create($user['User']['birthdate']), "F d, Y")); ?><br>
						<span class="text-muted">Age:</span> <?= h($yourage) ?><br>
						<span class="text-muted">Gender:</span> <?= h($user['User']['gender'] != '' ? ($user['User']['gender'] == 'M' ? "Male" : "Female") : '') ?><br><br>
						<span class="text-muted">Hobby</span><br> <?= h($user['User']['hubby']) ?><br><br>
						<small class="text-muted">Created: <?= h($user['User']['created']) ?></small><br>
						<small class="text-muted">Last Login: <?= h($user['User']['last_login_time']) ?></small>
					</div>
					<div class="col-md-6">
						<div class="activity-mini">
							<i class="glyphicon glyphicon-comment text-muted"></i> Comments: 500
						</div>
						<div class="activity-mini">
							<i class="glyphicon glyphicon-thumbs-up text-muted"></i> Likes: 1500
						</div>
					</div>
					</fieldset>
				</div>
            </div>
		</div>
	</div>
</div>