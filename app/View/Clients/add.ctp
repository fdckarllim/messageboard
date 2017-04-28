<?php echo $this->Form->create('Client', array('class' => 'form-horizontal')); ?>

<fieldset>

<!-- Form Name -->
<legend>Add Client</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fname">Firstname</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('fname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your firstname here...')); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Middlename</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('mname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your middlename here...')); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lname">Lastname</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('lname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your lastname here...')); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nickname">Nickname</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('nickname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your nickname here...')); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nickname">Birthdate</label>  
  <div class="col-md-5">
  <?php echo $this->Form->input('birthdate', array('type' => 'date', 'label' => false, 'class' => 'form-control input-md dateInput', 'placeholder' => 'Your birthdate here...', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 18)); ?>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>
  <div class="col-md-4"> 
      <?php echo $this->Radio->display('input1'); ?>
  </div>
</div>

<!-- email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="login_id">Email</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('email_address', array('type' => 'email', 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your email address here...')); ?>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">

      <input type="radio" name="gender" id="gender-0" value="1" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="2">
      Female
    </label>
  </div>
</div>

<!-- phone input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone_number">Phone number</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('phone_number', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your phone number here...')); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fname">Login_ID</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('login_id', array('type' => 'text', 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your login_id here...')); ?>
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="login_id">Password</label>  
  <div class="col-md-5">
    <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your password here...')); ?>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpassword">Confirm password</label>
  <div class="col-md-5">
    <input id="cpassword" name="cpassword" type="password" placeholder="Confirm your password..." class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-primary">Save</button>
    <button id="cancel" name="cancel" class="btn btn-default" value="1">Cancel</button>
  </div>
</div>

</fieldset>
<?php echo $this->Form->end(); ?>
