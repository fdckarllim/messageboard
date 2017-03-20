<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend class="text_center login_title"><?php echo __('Registration'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Name'));
		echo $this->Form->input('email', array('label' => 'Email Address'));
        echo $this->Form->input('password', array('label' => 'Create a password'));
        echo $this->Form->input('confirm_password', array('label' => 'Confirm your password', 'type' => 'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Register')); ?>
<?php echo $this->Html->link(__('Login'), array('action' => 'login')); ?>
