<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription ?>:
    <?php echo $title_for_layout; ?>
  </title>
  <?php

  echo $this->fetch('meta');
    echo $this->fetch('css');
    //
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('bootstrap-theme.min');
    //echo $this->Html->css('bootstrap-responsive');
    //echo $this->Html->css('bootstrap-responsive.min');
    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap');
    echo $this->Html->script('bootstrap.min');
    echo $this->fetch('script');

     //<script type="text/javascript" src="/js/jquery-common.js"></script>
     //<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php
echo $this->Html->script('postdel.js');
echo $this->Html->script('comment.js');
//echo $this->Html->script('comment1.js');
?>

</head>
 <body data-target=".bs-docs-sidebar" data-spy="scroll" data-twttr-rendered="true">
    <div id="fix-for-navbar-fixed-top-spacing" style="height: 42px;">&nbsp;</div>

<?php if ($this->fetch('menu')): ?>
<div class="menu">
    <h3>Menu options</h3>
    <?php echo $this->fetch('menu'); ?>
</div>
<?php endif; ?>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">



          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Posts<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <?php
                echo "<li>" . $this->Html->link('View Posts',
                 array('controller' => 'posts', 'action' => 'listPost',)
                ) ."</li>";
                if ($this->Session->check('username')) {
                  echo "<li>". $this->Html->link('Add Post',
                  array('controller' => 'posts' ,'action' => 'add')
                  ) ."</li>";
                 } ?>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Tags<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php
                echo"<li>". $this->Html->link('Tags',
                    array('controller' => 'tags', 'action' => 'index')
                )."</li>";
               if ($this->Session->check('username')) {
                 if (AuthComponent::user('role') == 'admin') {

                  echo"<li>". $this->Html->link('Add Tag',
                      array('controller' => 'tags', 'action' => 'add')
                  )."</li>";
                }
              }?>
            </ul>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <p class="navbar-text navbar-right">Welcome <a href="#" class="navbar-link"><?php echo $this->Session->read('Auth.User.username');?> </a></p>
          <?php if ($this->Session->check('username')) { ?>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span> Account<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <?php

                echo "<li>". $this->Html->link('Edit Info',
                array('controller' => 'users' ,'action' => 'edit', AuthComponent::user('id'))
                )."</li>";
                if (AuthComponent::user('role') == 'admin') {

                  echo"<li>". $this->Html->link('Edit User',
                  array('controller' => 'users', 'action' => 'index')
                  )."</li>";
                }
                echo "<li>" .  $this->Html->link('Logout',
                array('controller' => 'users' ,'action' => 'logout')
                ) . "</li>";
              } else {
                echo"<li>". $this->Html->link('Login',
                  array('controller' => 'users', 'action' => 'login')
                  )."</li>";
                echo"<li>". $this->Html->link('Register',
                  array('controller' => 'users', 'action' => 'add')
                  )."</li>";

              }?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



  <div id="content">
  <div class="container-fluid">
    <div id="fix-for-navbar-fixed-top-spacing" style="height: 42px;">&nbsp;</div>
    <?php // echo $this->fetch('title'); ?>
    <div class="row">
      <div class="col-md-1 col-md-offset-1">

        <ul class="nav nav-list bs-docs-sidenav">
         <?php  echo $this->fetch('sidebar'); ?>
        </ul>
      </div>
      <div class="col-md-5">
      <div class="row">
        <center><div class='col-md-4 col-md-offset-3'>
          <?php echo $this->Session->flash(); ?>
      </div></center></div>

        <?php echo $this->fetch('content'); ?>
      </div>
    </div>
  </div>
</div>



<div id="footer">

</div>
<?php echo $this->Js->writeBuffer(); ?>

</body>
</html>
