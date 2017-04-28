<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

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
  <?php echo $this->Form->input('birthdate', array('type' => 'text', 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your birthdate here...')); ?>
  </div>
</div>

<!-- Multiple Radios (inline) -->
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-5">
  <input id="username" name="username" type="text" placeholder="Your username here..." class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="Your password here..." class="form-control input-md" required="">
    
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
