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
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription ?>:
    <?php echo $title_for_layout; ?>
  </title>
  <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('cake.generic');


    //
    echo $this->Html->css('cake.generic');

    echo $this->Html->css('bootstrap');

    echo $this->Html->css('bootstrap.min');

    echo $this->Html->css('bootstrap-responsive');

    echo $this->Html->css('bootstrap-responsive.min');
    //

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    //
    echo $this->Html->script('bootstrap');

    echo $this->Html->script('bootstrap.min');
//
  ?>


</head>
<body>


<?php if ($this->fetch('menu')): ?>
<div class="menu">
    <h3>Menu options</h3>
    <?php echo $this->fetch('menu'); ?>
</div>
<?php endif; ?>

 body { padding-top: 70px; }
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">Blog </a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <?php 
          echo "<li>". $this->Html->link('Posts',
                 array('controller' => 'posts', 'action' => 'index')
                 ) ."</li>";
            
          if ($this->Session->check('username')) {

            echo "<li>". $this->Html->link('Add Post',
               array('controller' => 'posts' ,'action' => 'add')
               ) ."</li>";
            

              if (AuthComponent::user('role') == 'admin') {
                echo"<li>". $this->Html->link('Tag',
                      array('controller' => 'tags', 'action' => 'index')
                      )."</li>";
                echo"<li>". $this->Html->link('Add Tag',
                      array('controller' => 'tags', 'action' => 'add')
                      )."</li>";
               
                echo"<li>". $this->Html->link('Edit User',
                      array('controller' => 'users', 'action' => 'index')
                      )."</li>";        
              } 
         
            echo "<ul class='nav navbar-nav navbar-right'>";
            echo "<li ></li>";

            echo "<li>". $this->Html->link('Edit Info',
               array('controller' => 'users' ,'action' => 'edit', AuthComponent::user('id'))
               )."</li>";   
            echo "<li><a>Welcome ". $this->Session->read('Auth.User.username') . "</a></li>"; 
            echo "<li>" .  $this->Html->link('Logout',
              array('controller' => 'users' ,'action' => 'logout')
              ) . "</li></ul>";

          } else {
          echo "<li>". $this->Html->link('Login',
            array('controller' => 'users' ,'action' => 'login')
            ). "</li>"; 

          echo"<li>". $this->Html->link('Register',
            array('controller' => 'users' ,'action' => 'add')
            ). "</li>";
          }
         
         ?>
       </ul>
      </div>
    </div>
  </div>

<div id="content">
   
  <div class="container">
     container: { padding-top: 30px; }
    <?php echo $this->Session->flash(); ?>

    <?php echo $this->fetch('content'); ?>
  </div>
</div>
<div id="footer">
  <?php echo $this->Html->link(
      $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
      'http://www.cakephp.org/',
      array('target' => '_blank', 'escape' => false)
    );
  ?>
  </div>
<?php echo $this->element('sql_dump'); ?>


</body>
</html>
