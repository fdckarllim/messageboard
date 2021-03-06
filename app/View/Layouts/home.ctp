<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php

echo $this->Html->css('cake.custom');

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
<div id="content">
	<?php echo $this->fetch('content'); ?>
</div>

<!-- Add a footer to each displayed page -->
<!-- <div id="footer">FOOTER</div> -->

</body>
</html>