<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Karl Vincent Lim" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Lending Management System | Karl Vincent Lim</title>
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
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- HEADER END-->

    <?php $name = AuthComponent::user('name'); 
    if (isset($name) && $name): ?>

    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php echo $this->Html->link(__('LMS'), array('controller' => 'users', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
                <!-- <a class="navbar-brand" href="index.html">
                LMS -->
                    <!-- <img src=" -->
                    <?php //echo $this->webroot; ?>
                    <!-- img/logo.png" /> -->
                <!-- </a> -->

            </div>

     <!--        <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <?php //echo $this->Session->read('Auth.User.name'); ?>
                                        <img src="<?php echo $this->webroot; ?>img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $this->Session->read('Auth.User.name'); ?></h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr /> -->
                                <?php //echo $this->Html->link(__('Profile'), array('controller' => 'users', 'action' => 'profile', AuthComponent::user('id')), array('class' => 'btn btn-info btn-sm')); ?>
                                <?php //echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-danger btn-sm')); ?>

                       <!--      </div>
                        </li>


                    </ul>
                </div>
            </div> -->
        </div>
    </div>
        <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li>
                            <!-- <a class="menu-top-active" href="index.html">Dashboard</a> -->
                            <?php echo $this->Html->link(__('Dashboard'), array('controller' => 'users', 'action' => 'index')); ?>
                            </li>
                            <li>
                                <!-- <a href="ui.html">UI Elements</a> -->
                                <?php echo $this->Html->link(__('Clients'), array('controller' => 'clients', 'action' => 'index')); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link(__('Reports'), array('controller' => 'users', 'action' => 'index')); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link(__('Profile'), array('controller' => 'users', 'action' => 'profile', AuthComponent::user('id'))); ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
                                
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- LOGO HEADER END-->
    <?php endif ?>   
    <div class="content-wrapper">
        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 HVV | By : <a href="http://www.designbootstrap.com/" target="_blank">Kaaru-Rimu</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <?php 
        echo $this->Html->script('jquery-1.12.4'); // Include jQuery library
        echo $this->Html->script('jquery-ui'); // Include jQuery library
        echo $this->Html->script('bootstrap'); // Include BOOTSTRAP SCRIPTS
        echo $this->Html->script('dataTables2'); // Include BOOTSTRAP SCRIPTS
        echo $this->Html->script('dataTables'); // Include BOOTSTRAP SCRIPTS
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "columnDefs": [ {
                "targets": 'no-sort',
                "orderable": false,
                } ]
            } );
        } );
        $('#birthdate').datepicker({ 
            changeYear: true,
            yearRange: "-100:+0",
            showButtonPanel: true,
            changeMonth: true
        });
    </script>
</body>
</html>
