
	<!-- ADDING PRINCIPAL Modal -->
	<div class="modal fade" id="principalModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Add Principal</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">

					<?php echo $this->Form->create('Principal', array('class' => 'form-horizontal')); ?>
					<?php echo $this->Flash->render(); ?>
					<div class="form-group">
						<label  class="col-sm-3 control-label"
						  for="amount">Amount</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('amount', array('label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Place amount to borrow...', 'required' => true)); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"
						for="inputPassword3" >Months To Pay</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('months_to_pay', array('type' => 'number', 'min' => .5, 'max' => 12, 'step' => .5, 'label' => false, 'class' => 'form-control input-md', 'placeholder' => 'Number of months to pay...')); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"
						for="inputPassword3" >Date Borrowed</label>
						<div class="col-sm-9">
							<?php echo $this->Form->input('borrow_date', array('type' => 'date', 'default' => date("Y-m-d"), 'label' => false, 'required' => true, 'class' => 'form-control input-md dateInput', 'placeholder' => 'Your birthdate here...', 'minYear' => date('Y') - 10, 'maxYear' => date('Y') + 1)); ?>
						</div>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="reset" class="btn btn-default">Cancel</button>
					<button id="submit" name="submit" class="btn btn-primary" value="addprincipal">Save</button>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>

	<!-- ADDING PAYMENT Modal -->
	<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Add Payment</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">

					<?php echo $this->Form->create('Payment', array('class' => 'form-horizontal')); ?>
					<?php echo $this->Flash->render(); ?>
					<div class="form-group">
						<label  class="col-sm-2 control-label"
						  for="amount">Amount</label>
						<div class="col-sm-10">
							<div class="input-group"> 
	        					<span class="input-group-addon">&#8369;</span>
								<?php echo $this->Form->input('amount', array('label' => false, 'class' => 'form-control input-md currency', 'placeholder' => 'Place amount to borrow...', 'required' => true)); ?>
								</div>
						</div>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="reset" class="btn btn-default">Cancel</button>
					<button id="submit" name="submit" class="btn btn-primary" value="addpayment">Save</button>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>

	<!-- ADDING ADVANCEMENT Modal -->
	<div class="modal fade" id="advanceModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" 
					data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Cash Advance</h4>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">

					<?php echo $this->Form->create('Advancement', array('class' => 'form-horizontal')); ?>
					<?php echo $this->Flash->render(); ?>
					<div class="form-group">
						<label  class="col-sm-2 control-label"
						  for="amount">Amount</label>
						<div class="col-sm-10">
							<div class="input-group"> 
	        					<span class="input-group-addon">&#8369;</span>
								<?php echo $this->Form->input('amount', array('label' => false, 'class' => 'form-control input-md currency', 'id' => 'txtInterest', 'placeholder' => 'Place amount to borrow...', 'required' => true)); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-2 control-label"
						  for="amount">Interest</label>
						<label class="col-sm-10 control-label" id='lblInterest'>&#8369; 0</label>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="reset" class="btn btn-default">Cancel</button>
					<button id="submit" name="submit" class="btn btn-primary" value="addadvance">Save</button>
				</div>
			</div>
		</div>
	</div>
