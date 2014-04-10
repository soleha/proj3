<?php 
if (AuthComponent::user('role') == 'admin') {
  $this->start('sidebar');?>
  <div class="page-header"><h3>Actions</h3></div> 
  <?php
  echo "<li>" . $this->Html->link('Add tag',
         array('controller' => 'tags', 'action' => 'add',)
         ) ."</li>"; 
  echo "<li>" . $this->Html->link('Edit tag',
         array('controller' => 'tags', 'action' => 'index',)
         ) ."</li>"; 
}
$this->end();
?> 

<div class="container">
  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>
  <div class="row">
    <div class="col-md-1 col-md-offset-1">
      <ol class="breadcrumb">
        <li class="active">Tag</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">   
      <div class="page-header"><h2>Tags</h2></div>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-1">
    <table class="table table-hover table-striped">
      <tr>
        <td>Id</td>
        <td>Tag</td>
        <?php  if (AuthComponent::user('role') == 'admin') {
        echo "<td>Action</td><td></td>"; } ?>
        
        <td>Created</td>
      </tr>
      <?php foreach  ($tags as $tag): ?>
      <tr>
        <td> <?php echo  $tag['Tag']['id'] ?></td>

        <td><?php echo $tag['Tag']['tag'] ?></td>
        <?php 
        if (AuthComponent::user('role') == 'admin') {
          echo "<td>";
          echo $this->Html->link(
              '<span class="glyphicon glyphicon-pencil"></span> Edit',
              array('action' => 'edit', $tag['Tag']['id']), 
              array('class' => 'btn btn-primary btn-sm', 'target' => '_blank', 'escape' => false)
            );
          echo "</td>";
          echo "<td>";
          echo $this->Form->postButton('<span class="glyphicon glyphicon-trash"></span> delete',
             array('action' => 'delete', $tag['Tag']['id']), 
             array('class' => 'btn btn-danger', 'target' => '_blank', 'escape' => false)
            );
          echo "</td>";
        }
        ?>
        <td><?php echo date('M j Y, h:i A', strtotime($tag['Tag']['created'])); ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>
