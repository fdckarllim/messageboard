<?php if (isset($_GET['step']) && $_GET['step'] == 2) { ?>
  <?php echo $this->Form->create('Principal', array('class' => 'form-horizontal')); ?>
  <fieldset>

  <!-- Form Name -->
  <legend>Add Principal</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="fname">Amount</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('amount', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Place amount to borrow...', 'required' => true)); ?>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="mname">Months to pay</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('months_to_pay', array('type' => 'number', 'min' => 1, 'max' => 12, 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Number of months to pay...')); ?>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="birthdate">Date borrowed</label>  
    <div class="col-md-5">
    <?php echo $this->Form->input('borrow_date', array('type' => 'date', 'empty' => array('day' => 'DAY', 'month' => 'MONTH', 'year' => 'YEAR'), 'label' => false, 'required' => true, 'class' => 'form-control input-md dateInput', 'placeholder' => 'Your birthdate here...', 'minYear' => date('Y') - 10, 'maxYear' => date('Y') + 1)); ?>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-5">
      <button id="submit" name="submit" class="btn btn-primary" value="addprincipal">Save</button>
      <button id="skip" name="submit" class="btn btn-default" value="skip">Skip</button>
    </div>
  </div>

  </fieldset>
  <?php echo $this->Form->end(); ?>
<?php } else {?>

  <?php echo $this->Form->create('Client', array('class' => 'form-horizontal')); ?>
  <fieldset>

  <!-- Form Name -->
  <legend>Add Client</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="fname">Firstname</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('fname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your firstname here...', 'required' => true)); ?>
      
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
      <?php echo $this->Form->input('lname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your lastname here...', 'required' => true)); ?>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nickname">Nickname</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('nickname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your nickname here...', 'required' => true)); ?>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="birthdate">Birthdate</label>  
    <div class="col-md-5">
    <?php echo $this->Form->input('birthdate', array('type' => 'date', 'empty' => array('day' => 'DAY', 'month' => 'MONTH', 'year' => 'YEAR'), 'label' => false, 'required' => true, 'class' => 'form-control input-md dateInput', 'placeholder' => 'Your birthdate here...', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 18)); ?>
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

  <!-- phone input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="phone_number">Phone number</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('phone_number', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your phone number here...')); ?>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="login_id">Login_ID</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('login_id', array('type' => 'text', 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your login_id here...', 'required' => true)); ?>
      
    </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="password">Password</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your password here...', 'required' => true)); ?>
    </div>
  </div>

  <!-- Password input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="cpassword">Confirm Password</label>  
    <div class="col-md-5">
      <?php echo $this->Form->input('cpassword', array('type' => 'password','label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Please confirm your password...', 'required' => true)); ?>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-8">
      <button id="submit" name="submit" class="btn btn-primary" value="addclient">Save</button>
      <button id="cancel" name="cancel" class="btn btn-default" value="1">Cancel</button>
    </div>
  </div>

  </fieldset>
  <?php echo $this->Form->end(); ?>
<?php } ?>