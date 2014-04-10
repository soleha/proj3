<!-- File: /app/View/Posts/view.ctp -->

<?php
if ($this->Session->check('username')) {
  $this->start('sidebar'); ?>
  <div class="page-header"><h3>Actions</h3></div>
  <?php
  echo "<li>". $this->Html->link('Post',
  array('controller' => 'posts' ,'action' => 'listPost')
  ) ."</li>";
  echo "<li>". $this->Html->link('Add Post',
  array('controller' => 'posts' ,'action' => 'add')
  ) ."</li>";
 }
$this->end();
?>

<div class="container dv">

  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-3">
      <ol class="breadcrumb">
          <?php
           echo "<li>" . $this->Html->link('Posts',
                         array('controller' => 'posts', 'action' => 'listPost',)
                        ) ."</li>";
          ?>
        <li class="active">View</li>
      </ol>
    </div>
  </div>
<div class="col-md-8 col-md-offset-2">
  <div class="page-header"><h1 id="tab1">Post</h1></div>
    <h2><?php echo h($post['Post']['title']); ?></h2>

    <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

    <h4><p><?php echo h($post['Post']['body']); ?></p></h4><br><br>
    <div id="msg"><i><b>Your post has been deleted</b></i></div>
    <?php if ($this->Session->check('username')) { ?>
    <h4><button id="com" class="btn-warning">Add Comment</button></h4> <?php } else { ?>
    <h4><button id="com" class="btn-info" disabled="disabled">Add Comment <br><small><b>Login to comment</b>
    </small></button></h4> <?php } ?>



    <div class="jumbotron centered" id="comment">
      <div class="page-header"><h3>Add Comment</h3></div>

      <?php
      echo $this->Form->create('Comment', array(
                    'inputDefaults' => array(
                      'required' => 'false',
                      'label' => false,
                    ),
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'default' => 'false',
                    'id' => 'com-sub'

            )
      );
      echo $this->Form->input('comment',
        array(
          'rows' => '2',
          'id' => 'comm' ,
          'label' => 'Comment',
          'div' => 'form-group',
          'before' => '<div class= "col-md-2">',
          'between' => '</div><div class="col-md-offset-3">',
          'error' => array(
            'attributes' => array('wrap' =>
              array('span',), 'class' => 'del-com alert alert-danger'
          )) )
        );


      echo $this->Form->submit('Save Comment',array(' class'=>'btn btn-success ',' name'=>'commit' ,
        'type'=>'submit',));
      echo $this->Form->end(); ?>
    </div>
    </div>



  <table class ="table table-hover" id="comments">
  <tr>
      <td><b>Name</b></td>
      <td><b>Comment</b></td>

      <td><b>Action</b></td>
      <td></td>

      <td><b>Created</b></td>
    </tr>

    <?php
    foreach ($post['Comment'] as $com) {
      echo"<tr><td>";
      echo $com['User']['username'];
      echo "</td>";
      echo "<td>" . $com['comment'] . "</td>";

      if ($com['user_id'] ==  AuthComponent::user('id') ||
          (AuthComponent::user('role') == 'admin')) {

        echo "<td>";
        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Edit',
          array('action' => 'editCom',
            $com['id']),
            array('class' => 'btn btn-primary btn-sm', 'escape' => false)
        );
        echo "</td>";
        echo "<td>";
        echo $this->Html->link( '<span class="glyphicon glyphicon-trash"></span> Delete',
          array( 'controller' =>'posts' ,'action' => 'deleteCom', $com['id']),
            array('class' => 'del-com btn btn-danger btn-sm','escape' => false)

        );
         echo "</td>";
      }else {
        echo "<td colspan='2'>---</td>";

      }
      echo "<td>". date('M j Y, h:i A', strtotime($com['created'])). "</td></tr>";


    }
    ?>

  </table>
</div>

<?php


// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus


 //www.devdungeon.com/content/ajax-form-submit-cakephp-2x#sthash.pJ2RXU9h.dpuf
/*
// app/View/Posts/view.ctp
$this->extend('/Common/view');

$this->assign('title', $post);

$this->start('sidebar');
?>
<li>
<?php
echo $this->Html->link('edit', array(
    'action' => 'edit',
    $post['Post']['id']
)); ?>
</li>
<?php $this->end();


// create the sidebar block.
$this->start('sidebar');
echo $this->element('sidebar/recent_topics');
echo $this->element('sidebar/recent_comments');
$this->end();
//$this->assign('sidebar', '');


echo $this->fetch('sidebar');

// In a view file.
// Create a navbar block
$this->startIfEmpty('navbar');
echo $this->element('navbar');
echo $this->element('notifications');
$this->end();

 $this->startIfEmpty('navbar'); ?>
<p>If the block is not defined by now - show this instead</p>
<?php $this->end();

// Somewhere later in the parent view/layout
echo $this->fetch('navbar');
*/
?>

<?php //print_r($this->params['pass']); exit; ?>
