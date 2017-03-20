<div class="main-content">
        <div class="form-mini-container">
           <h1>Login</h1>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->Form->create('User', array('class' => 'form-mini')); ?>
            <span id="auth_message"></span>
                <?php 
                    echo $this->Form->input('email', array('placeholder' => 'Email address', 'label' => false, 'div' => array('class' => 'form-row')));
                    echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => false, 'div' => array('class' => 'form-row')));
                ?>
                <div class="form-row form-last-row">
                    <?php echo $this->Form->button(__('Submit'), array('type' => 'submit'));?>
                </div>
            <?php echo $this->Form->end(); ?>
            <p class='small-link'>
                Not registered? <?php echo $this->Html->link(__('Create an account'), array('action' => 'add')); ?>
            </p>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
      loadData(); 
    };
        
    function loadData() {
        var message = "<?php echo $error_login; ?>";
        document.getElementById("auth_message").innerHTML = message;
    }
</script>