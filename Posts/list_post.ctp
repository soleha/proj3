


 

<?php

if ($this->Session->check('username')) {

  $this->start('sidebar'); ?>

  <div class="page-header"><h3>Actions</h3></div> 

  <?php 
    echo "<li>". $this->Html->link('Add Post',
    array('controller' => 'posts' ,'action' => 'add')
    ) ."</li>"; 
    
 } 
$this->end();
?> 

<div class="container">

  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>

  <div class="row">
    <div class="col-md-1">
      <ol class="breadcrumb"> 
        <li class="active">Home</li>
      </ol>
    </div>
  </div>




    <div class="page-header"><h2><center> Posts</center> </h2></div>
      <div id="msg1"><i><b>Your post has been deleted</b></i></div>
      <table class ="table table-hover  table-condensed table-striped" >
      <tr>
        <th>Id</th> 
        <th>Title</th>
        <?php  if ($this->Session->check('username')) :
        echo "<th colspan=2>"; ?> 
        Actions
        <?php echo "</th>";
        endif ?>
        <th>Created</th>
      </tr>
      <?php foreach ($data as $post): ?>
      <tr>
        <td><?php echo  $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'],
          array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <?php
        if (($post['Post']['user_id'] == AuthComponent::user('id') ) || 
              (AuthComponent::user('role') == 'admin')) {
          echo "<td>";
          echo $this->Html->link(
            '<span class="glyphicon glyphicon-pencil"></span> Edit',

            array('action' => 'edit', $post['Post']['id']), 
            array('class' => 'btn btn-primary btn-sm', 
           'escape' => false)
          );
          echo "</td>";
          echo "<td>";
          echo $this->Html->link( '<span class="glyphicon glyphicon-trash"></span> Delete',
         array('action' => 'delete', $post['Post']['id']), 
          array('class' => 'del-post btn btn-danger btn-sm',
               'escape' => false, ));
          
    // echo $this->Html->link('Delete',
                      //array(
              //          'controller' => 'posts',
                     //   'action' => 'delete', 
                     //   $post['Post']['id']
                    //    ),
                    //  array(
                     //   'class' => 'delete-post btn btn-danger btn-sm',
                     //   )
                      
                  //  );

   //   echo $this->Js->link(
  //  'Delete Post',
   // array( 'controller' => 'posts', 'action' => 'delete', $post['Post']['id'] ),
   // array( 'update' => 'post' ),
   // 'Do you want to delete this post?');
          
          

           //$this->Js->event(
            //'click',
            //$this->Js->request(
            //  array('action' => 'delete', $post['Post']['id']),
              //  array('async' => true, 'update' => '$post[Post][id]')
             // )
           // ); 
           //echo $this->Js->get($post['Post']['id']);
//$result = $this->Js->effect('hide');




          echo "</td>";
        } else {
          if ($this->Session->check('username')) {

            echo "<td> You dont have permission to update this post </td>";
          }
        }  
        ?>
        <td><?php echo date('M j Y, h:i A', strtotime($post['Post']['created'])); ?></td>
      </tr>
      <?php endforeach; ?>
      <?php unset($post); ?>
      </table>
   
    <div class="col-md-9 col-md-offset-2">
    <?php
    echo $this->Paginator->counter(array(
        'format' => 'Page %page% of %pages%, showing %current% records out of
                 %count% total, starting on record %start%, ending on %end%'
    ));
    ?>

  </div>
  <div class="row">
    <div class="col-md-7 col-md-offset-3">
      <div class="pagination pagination-left">
      <?php echo $this->Paginator->numbers(); 

       echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); 
       echo $this->Paginator->next('  Next »', null, null, array('class' => 'disabled')); 

    //echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
    //echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass' ) );
    //echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) )

        echo $this->Paginator->counter(); ?>
    </div>
  </div>
</div>
