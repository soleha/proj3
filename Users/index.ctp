<?php 
$this->start('sidebar'); ?>
<div class="page-header"><h3>Actions</h3></div> 
<?php 
  echo "<li>". $this->Html->link('Add User',
  array('controller' => 'users' ,'action' => 'add')
  ) ."</li>"; 
$this->end();
?> 

<div class="container">
  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>

  <div class="row">
    <div class="col-md-1 col-md-offset-1">
      <ol class="breadcrumb">
        <li class="active">Users</li>
      </ol>
    </div>
  </div>
  <div class="col-md-offset-1 ">
  <div class="page-header"><h2><center>Users</center> </h2></div>
  <table class="table hover">
    <tr>
      <td>Id</td>
      <td>Name</td>
      <?php if (AuthComponent::user('role') == 'admin') {
        echo "<td>Action</td>"; } ?>
        <td></td>
      <td>Created</td>
      <td>Modified</td>
    </tr>

  <!-- Here is where we loop through our $users array, printing out user info -->

      <?php $this->set('showLayoutContent', true);
      foreach  ($users as $user): ?>
      <tr>
        <td> <?php echo $this->Html->link( $user['User']['id'], array(
                'controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>

        <td><?php echo $user['User']['username']; ?></td>
        <?php 
          if (AuthComponent::user('role') == 'admin') {
            echo "<td>";
           
            echo $this->Html->link(
                  '<span class="glyphicon glyphicon-pencil"></span> Edit',
     
                  array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary', 
                    'target' => '_blank', 'escape' => false)
                );
            echo "</td>";
            echo "<td>";
      
            echo $this->Form->postButton('<span class="glyphicon glyphicon-trash"></span> Delete',
               array('action' => 'delete', $user['User']['id']),   array('class' => 'btn btn-danger', 
                'target' => '_blank', 'escape' => false)
              
              );
       
      
            echo "</td>";
          }
        ?>
          <td><?php echo date('M j Y, h:i A', strtotime($user['User']['created'])); ?></td>
          <td><?php echo date('M j Y, h:i A', strtotime($user['User']['modified'])); ?></td>
        </tr>
      <?php endforeach; ?>
      <?php unset($user); ?>
    </table>
  </div>
</div>