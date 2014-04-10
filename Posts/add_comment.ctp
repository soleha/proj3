
<div class="container">

  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>

  <div class="row">
    <div class="col-md-4 col-md-offset-3">
      <ol class="breadcrumb">
        <?php
         echo "<li>" . $this->Html->link('Posts',
                       array('controller' => 'posts', 'action' => 'listPost',)
                      ) ."</li>"; 
         echo "<li>". $this->Html->link('View Post',
                     array('controller' => 'posts' ,'action' => 'view', )
                     ) ."</li>"; ?>
       
        <li class="active">Add Comment</li>
      </ol>
    </div>
  </div>

  <div class="col-md-8 col-md-offset-2">
    <div class="jumbotron centered">
      <div class="page-header"><h2>Add Comment</h2></div>

      <?php
      echo $this->Form->create('Comment', array(
            'inputDefaults' => array(
              'required' => 'false',
              'label' => false,
                
                ),  
            'role' => 'form',
            'class' => 'form-horizontal',
            )
      );
      echo $this->Form->input('comment', array('rows' => '2', 'label' => 'Comment', 'div' => 'form-group',
        'before' => '<div class= "col-md-2">' ,'between' => '</div><div class="col-md-offset-3">',
        'error' => array(
              'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger'
          )) ));


      echo $this->form->submit('Save Comment',array(' class'=>'btn btn-success ',' name'=>'commit' ,
        'type'=>'submit' ));
      echo $this->Form->end(); ?>
    </div>
  </div>
</div>