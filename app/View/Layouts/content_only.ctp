<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php

	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap-theme');
	echo $this->Html->css('font-awesome');
	echo $this->Html->css('style');
	echo $this->Html->css('dataTables');
	echo $this->Html->css('jquery-ui');
	// Custom css
	echo $this->Html->css('custom');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
</head>
<body>

<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
<!-- <div id="header">
    <div id="menu">...</div>
</div> -->

<!-- Here's where I want my views to be displayed -->
	<div class="content-wrapper">
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

<!-- Add a footer to each displayed page -->
<!-- <div id="footer">FOOTER</div> -->

</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$( function() {
		$( "#datepicker" ).datepicker({
			yearRange: "-80:+0",
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
	});
</script>
</html>