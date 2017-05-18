<?php if (isset($_GET['step']) && $_GET['step'] == 2) { ?>
  <?php echo $this->Form->create('Principal', array('class' => 'form-horizontal')); ?>
  <fieldset>
<?php echo $this->Flash->render(); ?>
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
    <?php echo $this->Form->input('borrow_date', array('type' => 'date', 'default' => date("Y-m-d"), 'label' => false, 'required' => true, 'class' => 'form-control input-md dateInput', 'placeholder' => 'Your birthdate here...', 'minYear' => date('Y') - 10, 'maxYear' => date('Y') + 1)); ?>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-5">
      <button id="submit" name="submit" class="btn btn-primary" value="addprincipal">Save</button>
      <?php echo $this->Html->link(__('Add later'), array('controller' => 'clients', 'action' => 'details', $_GET['client_id']), array('class' => 'btn btn-default')); ?>
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
      <?php echo $this->Form->input('lname', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Your lastname here...')); ?>
      
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-8">
      <button id="submit" name="submit" class="btn btn-primary" value="addclient">Save</button>
      <button type="reset" id="reset" name="reset" class="btn btn-default" value="reset">Cancel</button>
    </div>
  </div>

  </fieldset>
  <?php echo $this->Form->end(); ?>
<?php } ?>