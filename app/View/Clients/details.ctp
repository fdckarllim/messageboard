<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-md-10 col-sm-12 profile-name">
			<h1><?php echo $client['fname'].' '.$client['mname'].' '.$client['lname']; ?></h1>

		</div>
		<!-- <div class="col-md-2 col-sm-12">
			<img title="profile image" class="img-circle img-responsive profile-image" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100">
		</div> -->
	</div><br/>

	<div class="row">
		<div class="col-sm-3">

			<div class="row">
				<div class="col-sm-12">
					<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#paymentModal" <?php echo isset($client['balance']) && $client['balance'] != 0 ? '' : 'disabled="true"';?>>PAY NOW!</button><br/>
					<!-- hide principal button if principal amount is set -->
					<?php if(isset($principal['amount'])) : ?>
					<button type="button" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#advanceModal">ADVANCE</button>
					<?php else : ?>
					<button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#principalModal">ADD PRINCIPAL</button>
					<?php endif; ?>
				</div>
			</div>
			<br/>
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
					</span> <?php echo $client['balance'] ? "&#8369; ".$client['balance'] : "<small><i>No Balance</i></small>"; ?>
				</li>

			</ul>
			<!-- next pay info panel -->
			<div class="panel panel-default">
				<div class="panel-heading">Next Pay 
				</div>
				<div class="panel-body">
					<i class="fa fa-money fa-1x"></i>
					<?php if($client['balance']): ?>&nbsp;&nbsp;&nbsp;&nbsp;
						&#8369; <small> <?php echo $client['phone_number'];?></small>
					<?php else : echo '<i>&nbsp;&nbsp;&nbsp;<small>nothing to pay</small></i>'; ?>
					<?php endif; ?>
					<br>

					<!-- <i class="fa fa-calendar fa-1x"></i>
					<?php if($client['email_address']): ?>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="mailto:<?php echo $client['email_address'].'?subject=Mail from Our Site'; ?>"><small> <?php echo $client['email_address']; ?></small></a>
					<?php else : echo '<i>&nbsp;&nbsp;&nbsp;&nbsp;<small>no email_address</small></i>'; ?>
					<?php endif; ?> -->
				</div>
			</div>

			<!-- <div class="panel panel-default">
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
			</div> -->

			<!-- <div class="panel panel-default">
				<div class="panel-heading">Social Media</div>
				<div class="panel-body"> 
					<i class="fa fa-facebook fa-2x"></i> 
					<i class="fa fa-github fa-2x"></i> 
					<i class="fa fa-twitter fa-2x"></i> 
					<i class="fa fa-pinterest fa-2x"></i> 
					<i class="fa fa-google-plus fa-2x"></i>
				</div>
			</div> -->
		</div>

		<div class="col-sm-9">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a href="#transactions" data-toggle="tab">Transactions</a>
				</li>
				<!-- <li class="">
					<a href="#messages" data-toggle="tab">Messages</a>
				</li>
				<li class="">
					<a href="#settings" data-toggle="tab">Settings</a>
				</li> -->
			</ul>
			<div class="tab-content">

			<!-- home tab -->
				<div class="tab-pane active" id="transactions">
					<div class="table-responsive">
						<h1></h1>
						<div class="col-md-12">
							<table class="table table-hover table-striped" id="dataTable">
								<thead>
									<tr>	
										<th class="no-sort">#</th>
										<th>Amount</th>
										<th>Interest</th>
										<th>Type</th>
										<th>Balance</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody id="items">
								<?php 
								if ($transactions) {
									$num = count($transactions);
									foreach ($transactions as $transaction) {
										$tdata = $transaction['Transaction']; 
										$date = date_create($tdata['created']);
										switch ($tdata['type']) {
											case '1':
												$ttype = 'PRINCIPAL';
												break;
											case '2':
												$ttype = 'ADVANCE';
												break;
											case '3':
												$ttype = 'PAYMENT';
												break;
											default :
												$ttype = 'NA';
												break;
										}

										?>
									<?php if (isset($tdata['balance']) && $tdata['balance'] == 0) { ?>
										<tr class="full-payment">
											<td colspan="6">
												<div class="text-center">
													<small><i>FULL PAYMENT</i></small>
												</div>
											</td>
										</tr>
									<?php } ?>
									<tr class="<?php echo $num==count($transactions) ? 'latest-transaction' : '';?>" >
										<td><?php echo $num; ?></td>
										<td>&#8369; <?php echo $tdata['amount']; ?></td>
										<td><?php echo $tdata['interest']!=0?'&#8369; '.$tdata['interest']:'<small><i>NA</i></small>'; ?></td>
										<td><?php echo $ttype; ?></td>
										<td>&#8369; <?php echo $tdata['balance']; ?></td>
										<td><?php echo date_format($date, 'F j, Y | g:ia l'); ?> &nbsp;&nbsp;&nbsp;<span class="label label-warning">NEW</span></td>
									</tr>
								<?php 
								$num--;
								} } ?>

								</tbody>
							</table>
						<hr>
						</div>
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
	<?php echo $this->element('modals'); ?>

</div>