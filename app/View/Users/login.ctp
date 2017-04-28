<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Please Login To Enter </h4>

    </div>

</div>
<div class="row">
    <div class="col-md-6">

        <h4>Login with <strong>HVV Account :</strong></h4><br/>
        <div id="auth_message"></div>
        <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('email', array('label' => 'Enter Email ID : ','class' => 'form-control')); ?>
        <?php echo $this->Form->input('password', array('label' => 'Enter Password :  ', 'class' => 'form-control')); ?> 
        <hr />
        <?php
         echo $this->Form->button($this->Html->tag('span','&nbsp;Login',array('class' => 'glyphicon glyphicon-user')), array('type'=>'submit', 'class' => 'btn btn-info')); ?>&nbsp;
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-md-6">
        
        <div class="alert alert-info">
            This is a free bootstrap admin template with basic pages you need to craft your project. 
            Use this template for free to use for personal and commercial use.
            <br />
             <strong> Some of its features are given below :</strong>
            <ul>
                <li>
                    Responsive Design Framework Used
                </li>
                <li>
                    Easy to use and customize
                </li>
                <li>
                    Font awesome icons included
                </li>
                <li>
                    Clean and light code used.
                </li>
            </ul>
           
        </div>
        <div class="alert alert-success">
             <strong> Instructions To Use:</strong>
            <ul>
                <li>
                   Lorem ipsum dolor sit amet ipsum dolor sit ame
                </li>
                <li>
                     Aamet ipsum dolor sit ame
                </li>
                <li>
                   Lorem ipsum dolor sit amet ipsum dolor
                </li>
                <li>
                     Cpsum dolor sit ame
                </li>
            </ul>
           
        </div>
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