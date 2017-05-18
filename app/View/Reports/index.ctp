
<h1>Reports</h1></br>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Amount</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($reports as $report) { ?>
			<tr>
				<td><?php echo  $report['id']; ?></td>
				<td><?php echo $report['name']['fname'].' '.$report['name']['lname']; ?></td>
				<td><?php echo $report['total_interest']; ?></td>
				<td><?php echo $report['date_paid']; ?></td>
			</tr>
		<?php } ?>

		</tbody>
	</table>
</div>
