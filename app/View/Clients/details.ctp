<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-md-10 col-sm-12 profile-name">
			<h1><?php echo $client['lname'].', '.$client['fname'].' '.$client['mname']; ?></h1>

		</div>
		<div class="col-md-2 col-sm-12">
			<img title="profile image" class="img-circle img-responsive profile-image" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-3">

			<ul class="list-group">
				<li class="list-group-item text-muted">Profile</li>
				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Nickname</strong>
					</span> <?php echo $client['nickname'] ? $client['nickname'] : $client['fname']; ?>
				</li>
				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Birthdate</strong>
					</span> <?php $birthdata = strtotime($client['birthdate']);
					 echo date('F d, Y', $birthdata); ?>
				</li>
				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Gender</strong>
					</span> <?php echo $client['gender'] != 0 ? $client['gender'] == 1 ? 'Male' : 'Female' : ' <i><small>Undecided</small></i>'; ?>
				</li>
				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Age
						</strong>
					</span> <?php echo $clientAge; ?>
				</li>
			</ul>

			<ul class="list-group">
				<li class="list-group-item text-muted">Lending Information  
					<i class="fa fa-dashboard fa-1x"></i>
				</li>

				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Principal amount</strong>
					</span><?php echo isset($principal['amount']) ? "&#8369; ".$principal['amount'] : "<small><i>NA</i></small>"; ?>
				</li>

				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Months to pay</strong>
					</span>  <?php echo isset($principal['months_to_pay']) ? $principal['months_to_pay']."<small> month/s</small>" : "<small><i>NA</i></small>"; ?> 
				</li>

				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Due Date
						</strong>
					</span>  <?php 
					if (isset($principal['due_date'])) {
						echo date_format(date_create($principal['due_date']), "F d, Y"); 
					} else {
						echo "<small><i>NA</i></small>";
					}
					
					?>
				</li>

				<li class="list-group-item text-right">
					<span class="pull-left">
						<strong>Current Balance
						</strong>
					</span> 78
				</li>

			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">Contact Info 
				</div>
				<div class="panel-body">
					<i class="fa fa-phone fa-1x"></i>
					<?php if($client['phone_number']): ?>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="tel:+<?php echo $client['phone_number']; ?>"><small> +<?php echo $client['phone_number'];?></small></a>
					<?php else : echo '<i>&nbsp;&nbsp;&nbsp;<small>no phone_number</small></i>'; ?>
					<?php endif; ?>
					<br>

					<i class="fa fa-envelope fa-1x"></i>
					<?php if($client['email_address']): ?>&nbsp;&nbsp;&nbsp;
					<a href="mailto:<?php echo $client['email_address'].'?subject=Mail from Our Site'; ?>"><small> <?php echo $client['email_address']; ?></small></a>
					<?php else : echo '<i>&nbsp;&nbsp;&nbsp;<small>no email_address</small></i>'; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Social Media</div>
				<div class="panel-body"> 
					<i class="fa fa-facebook fa-2x"></i> 
					<i class="fa fa-github fa-2x"></i> 
					<i class="fa fa-twitter fa-2x"></i> 
					<i class="fa fa-pinterest fa-2x"></i> 
					<i class="fa fa-google-plus fa-2x"></i>
				</div>
			</div>
		</div>

		<!-- ADDING PRINCIPAL FORM IF NO PRINCIPAL  -->
		<?php if(!isset($principal['amount'])) { ?>
		<div class="col-sm-9">
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
			      <button type="reset" class="btn btn-default">Cancel</button>
			    </div>
			  </div>

			  </fieldset>
			  <?php echo $this->Form->end(); ?>
		</div><hr>
		<?php } ?>
		<div class="col-sm-9">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a href="#transactions" data-toggle="tab">Transactions</a>
				</li>
				<li class="">
					<a href="#messages" data-toggle="tab">Messages</a>
				</li>
				<li class="">
					<a href="#settings" data-toggle="tab">Settings</a>
				</li>
			</ul>
			<div class="tab-content">

			<!-- home tab -->
				<div class="tab-pane active" id="transactions">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>	
									<th>#</th>
									<th>Amount</th>
									<th>Interest</th>
									<th>Type</th>
									<th>Balance</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody id="items">
								<tr>
									<td>1</td>
									<td>&#8369; 20,000</td>
									<td>&#8369; 6,000</td>
									<td>BORROW</td>
									<td>&#8369; 26,000</td>
									<td>March 11, 2017</td>
								</tr>
								<tr>
									<td>2</td>
									<td>&#8369; 4,350</td>
									<td><small><i>NA</i></small></td>
									<td>PAYMENT</td>
									<td>&#8369; 21,650</td>
									<td>March 24, 2017</td>
								</tr>
								<tr>
									<td>3</td>
									<td>&#8369; 4,000</td>
									<td>&#8369; 200</td>
									<td>BORROW</td>
									<td>&#8369; 25,850</td>
									<td>March 25, 2017</td>
								</tr>
							</tbody>
						</table>
						<hr>
						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<ul class="pagination" id="myPager"></ul>
							</div>
						</div>
					</div>
					<hr>
				</div>

				<!-- messages tab -->
				<div class="tab-pane" id="messages">
						<h2></h2>
						<ul class="list-group">
						<li class="list-group-item text-muted">Inbox</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Here is your a link to the latest summary report from the..
							</a> 2.13.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
						<li class="list-group-item text-right">
							<a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...
							</a> 2.11.2014
						</li>
					</ul>
				</div>

				<!-- settings tab -->
				<div class="tab-pane" id="settings">
					<hr>
					<form class="form" action="##" method="post" id="registrationForm">
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="first_name">
									<h4>First name</h4>
								</label> 
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="last_name">
									<h4>Last name</h4>
								</label> 
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="phone">
									<h4>Phone</h4>
								</label> 
								<input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="mobile">
									<h4>Mobile</h4>
								</label> 
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="email">
									<h4>Email</h4>
								</label> 
								<input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
								<label for="email">
									<h4>Location</h4>
								</label> 
								<input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
							<label for="password">
							<h4>Password
							</h4>
							</label> 
							<input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6"> 
							<label for="password2">
							<h4>Verify
							</h4>
							</label> 
							<input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12"> 
							<br> 
							<button class="btn btn-lg btn-success" type="submit">
							<i class="glyphicon glyphicon-ok-sign">
							</i> Save
							</button> 
							<button class="btn btn-lg" type="reset">
							<i class="glyphicon glyphicon-repeat">
							</i> Reset
							</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
</div>