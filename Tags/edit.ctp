<?php 
if ($this->Session->check('username')) {
  $this->start('sidebar'); ?>
  <div class="page-header"><h3>Actions</h3></div> 
  <?php 
  echo "<li>". $this->Html->link('View Tag',
    array('controller' => 'tags' ,'action' => 'index')
  ) ."</li>"; 
  echo "<li>". $this->Html->link('Add Tag',
    array('controller' => 'tags' ,'action' => 'add')
  ) ."</li>"; 
} 
$this->end();
?> 

<div class="container">
<?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>

  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <ol class="breadcrumb">
        <?php
         echo "<li>" . $this->Html->link('Tags',
                       array('controller' => 'tags', 'action' => 'index',)
              ) ."</li>"; ?>
        <li class="active"> Edit Tag</li>
      </ol>
    </div>
  </div>

  <div class="col-md-6 col-md-offset-2">
    <div class="jumbotron centered">
      <div class="page-header"><h2>Edit tag </h2></div>
      <?php
      echo $this->Form->create('Tag', array(
            'inputDefaults' => array(
              'required' => false,
              'label' => false,
                
                ),  
            'role' => 'form',
            )
      );
      echo $this->Form->input('tag',array('label' => 'Tag',  'div' => 'form-group','before' => 
        '<div class="col-md-1">','between' => '</div><div class="col-md-offset-3">', 'error' => array(
          'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger', 
        )))
      );
      echo $this->Form->input('id', array('type' => 'hidden'));

      echo $this->form->submit('Add',array(' class'=>'btn btn-success ',' name'=>'commit' ,'type'=>'submit'));
      echo $this->Form->end(); ?>
    </div>
  </div>
</div>


