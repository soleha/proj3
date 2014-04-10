<?php   

$this->start('sidebar'); ?>
<div class="page-header"><h3>Actions</h3></div> 
<?php 
if ($this->Session->check('username')) {
  echo "<li>". $this->Html->link('Add Post',
  array('controller' => 'posts' ,'action' => 'add')
  ) ."</li>"; 
 } 
$this->end();
?> 

<div class="container">
   container { padding: 70; }
  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>
<br><br>
  <div class="row">
    <div class="col-md-4 col-md-offset-3">
  <ol class="breadcrumb">
  
  <li class="active">Home</li>
</ol>
</div>
</div>

<div id="table table-condensed">
  
    <div class="page-header"><h2><center>My Posts</center> </h2></div>

    <table class ="table table-hover" >

      <tr>
        <th>Id</th> 
        <th>Title</th>
   
        <th colspan=2> 
        Actions
        </th>
  
        <th>Created</th>
      </tr>
        <?php foreach ($data as $post): ?>
      <tr>

        <td><?php echo  $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link($post['Post']['title'],
          array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
      
        <?php
       
            echo "<td>";
            echo $this->Html->link(
              '<span class="glyphicon glyphicon-pencil"></span> Edit',
 
              array('action' => 'edit', $post['Post']['id']), array('class' => 'btn btn-primary btn-sm', 'target' => '_blank', 'escape' => false)
            );
             echo "</td>";
              echo "<td>";
            echo $this->Form->postButton( '<span class="glyphicon glyphicon-trash"></span> Delete',
              array('action' => 'delete', $post['Post']['id']),   array('class' => 'btn btn-danger btn-sm', 'target' => '_blank', 'escape' => false)
            
            );

            echo "</td>";
          
      ?>
        <td><?php echo date('M j Y, h:i A', strtotime($post['Post']['created'])); ?></td>
      </tr>
      <?php endforeach; ?>
      <?php unset($post); ?>
    </table>
  </div>
</div>


<div class="row">
  <div class="col-md-10 col-md-offset-2">
<?php
echo $this->Paginator->counter(array(
    'format' => 'Page %page% of %pages%, showing %current% records out of
             %count% total, starting on record %start%, ending on %end%'
));
?>
</div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-4">
<div class="pagination pagination-left">
<?php echo $this->Paginator->numbers(); 

 echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); 
 echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); 

  //echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
  //echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass' ) );
  //echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) )

 echo $this->Paginator->counter(); ?>



</div>
</div>
</div>
