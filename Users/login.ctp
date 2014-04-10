

<!-- File: /app/View/Posts/edit.ctp -->
<div class="container">
<?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>
  <div class="col-md-6 col-md-offset-2">
    <div class="jumbotron ">
      <div class="page-header"><h2>Login</h2></div>
      <?php
      echo $this->Form->create('User', array(
            'inputDefaults' => array(
              'required' => false,
              'label' => false,
                
                ),  
            'role' => 'form',
            )
      );
      echo $this->Form->input('username',array('label' => 'Username', 'div' => 'form-group', 
        'before' => '<div class="col-md-1">', 'between' => '</div><div class="col-md-offset-3">', 
        'after' => '</div><div class="row"></div>','error' => array(
              'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger', )))
      );
      echo $this->Form->input('password', array('label' => 'Password', 'div' => 'form-group',
        'before' => '<div class="col-md-1">', 'between' => '</div><div class="col-md-offset-3">',
        'after' => '</div><div class="row"></div>', 'error' => array(
              'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger', )))
      );

      echo $this->form->submit('Login',array(' class'=>'btn btn-success ',' name'=>'commit' ,
        'before' => '<div class="col-md-offset-3">','type'=>'submit'  )
      );
      echo $this->Form->end(); ?>
    </div>
  </div>
</div>

