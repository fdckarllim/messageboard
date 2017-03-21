<div class="main-content">
	<?php echo $this->Form->create('User', array('class' => 'form-register')); ?>
		<div class="form-register-with-email">
			<div class="form-white-background">
				<div class="form-title-row">
					<h1>Create an account</h1>
				</div>
				<div class="form-row">
					<label>
						<span>Name</span>
						<?php echo $this->Form->input('name', array('label' => false, 'div' => false)); ?>
					</label>
				</div>
				<div class="form-row">
					<label>
						<span>Email Address</span>
						<?php echo $this->Form->input('email', array('label' => false, 'div' => false)); ?>
					</label>
				</div>
				<div class="form-row">
					<label>
						<span>Gender</span>
						<?php echo $this->Form->input('name', array('label' => false, 'div' => false)); ?>
					</label>
				</div>
				<div class="form-row">
					<label>
						<span>Create a password</span>
						<?php echo $this->Form->input('password', array('label' => false, 'div' => false)); ?>
					</label>
				</div>
				<div class="form-row">
					<label>
						<span>Confirm your password</span>
						<?php echo $this->Form->input('confirm_password', array('label' => false, 'type' => 'password', 'div' => false)); ?>
					</label>
				</div>
				<div class="form-row">
					<label>
						<span>Birthdate</span>
						<?php echo $this->Form->input('birthdate', array('label' => false, 'type' => 'text', 'div' => false, 'id' => 'datepicker')); ?>
					</label>
				</div>
				<div class="form-row">
					<label class="form-checkbox">
						<input type="checkbox" name="checkbox" checked>
						<span>I agree to the <a href="#">terms and conditions</a></span>
					</label>
				</div>

				<div class="form-row">
					<button type="submit">Register</button>
				</div>
			</div>
			<?php echo $this->Html->link(__('Already have an account? Login here →'), array('action' => 'login'), array('class' => 'form-log-in-with-existing')); ?>
		</div>
		<div class="form-sign-in-with-social">
			<div class="form-row form-title-row">
				<span class="form-title">Sign in with</span>
			</div>
			<a href="#" class="form-google-button disabled">Google</a>
			<a href="#" class="form-facebook-button disabled">Facebook</a>
			<a href="#" class="form-twitter-button disabled">Twitter</a>
		</div>
	<?php echo $this->Form->end(); ?>
</div>
<style type="text/css">
	a.disabled{
		pointer-events: none;
	}
</style>
