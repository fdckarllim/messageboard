<!-- <div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Please Login To Enter </h4>

    </div>

</div> -->
<div class="row login-form">
    <div class="col-sm-4 col-sm-offset-4">
        <h1 class="text-center">Login Form</h1>
        <hr>
        <div id="auth_message"></div>
        <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('email', array('label' => false,'class' => 'form-control login-email', 'placeholder' => 'Email Address')); ?>
        <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control login-pass', 'placeholder' => 'Password')); ?> 
        <hr />
        <button type="submit" class="btn btn-primary btn-block login-submit"><span class="glyphicon glyphicon-user"></span> Login</button>
        <?php echo $this->Form->end(); ?>
        <div class="col-md-12 text-center forgot-pass"><small>Forgot password?<a href="#"> Click here.</a></small></div>
    </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
<script type="text/javascript">
    window.onload = function() {
      loadData(); 
    };
        
    function loadData() {
        var message = "<?php echo $error_login; ?>";
        if (message) {
            document.getElementById("auth_message").innerHTML = "<div class='alert alert-danger'>" + message + "</div>";
        }
    }
</script>