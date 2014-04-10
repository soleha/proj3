
<!-- File: /app/View/Posts/add.ctp -->
<?php 
$this->start('sidebar'); ?>
<div class="page-header"><h3>Actions</h3></div> 

<?php   echo "<li>". $this->Html->link('Post',
  array('controller' => 'posts' ,'action' => 'listPost')
  ) ."</li>"; 
 echo "<li>" . $this->Html->link('Add Post',
                 array('controller' => 'posts', 'action' => 'add',)
                ) ."</li>"; 
$this->end();
?> 

<div class="container">
  <?php  echo $this->Session->flash('flash', array('element' => 'failure')); ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-3">
      <ol class="breadcrumb">
      <?php
       echo "<li>" . $this->Html->link('Posts',
                     array('controller' => 'posts', 'action' => 'listPost',)
                    ) ."</li>"; 
       
      ?>
        <li class="active">Add Post</li>
      </ol>
    </div>
  </div>
  <div class="col-md-6 col-md-offset-2">
    <div class="jumbotron centered">
    <div class="page-header"><h2>Add Post</h2></div>

    <?php
    echo $this->Form->create('Post', array(
          'id' => 'add1',
          'inputDefaults' => array('label' => false, 'required' => 'false'),  
          'role' => 'form',
           'class' => 'form-horizontal',
           'div' => 'false',
          )
    );
    echo $this->Form->input('title',array('label' => 'Title', 'div' => 'form-group','before' => 
      '<div class="col-md-1">','between' => '</div><div class="col-md-offset-3">', 'after' => '</div>',
      'error' => array(
            'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger', )))
    );

    echo $this->Form->input('body', array('rows' => '3', 'label' => 'Content', 'div' => 'form-group', 
      'before' => '<div class="col-md-1">', 'between' => '</div><div class="col-md-offset-3">', 
      'after' => '</div>', 'error' => array(
            'attributes' => array('wrap' => array('span',), 'class' => 'alert alert-danger',  )))
    );

    //echo $this->Form->input('tag', array('label' => 'Tag',)); 
    echo $this->Form->input('Tag',array(
              'label' => __('Tags',true),
              'type' => 'select',
              'multiple' => 'checkbox',
              'options' => $tags,
              'selected' => $this->html->value('Tag.Tag'),
              'div' => 'form-group','before' => 
              '<div class="col-md-1">',
              'between' => '</div><div class="col-md-offset-3">', 
              'after' => '</div>'
      )); 

   
    echo $this->form->submit('Add',array(' class'=>'btn btn-success ',' name'=>'commit' ,'type'=>'submit' ,
      'value'=>'Add', ));
    echo $this->Form->end(); ?>
    </div>
  </div>
</div>
<?php echo "ednfcjknfdlkjsnrfgbhfghngtjngj"; ?>


 <?php

//echo $html->selectTag('Tag/tag', $tags, null, array('multiple' => 'multiple'));
/*
$a= array();
foreach ($tags as $key => $value) {
 array_push($a, $value['Tag']['tag']);
}
$b = implode(',', $a);
echo $this->Form->input('field', array(
    'options' => (),
    'empty' => '(choose one)'
)); */
 //  echo $this->Form->input(, array('type' => 'hidden'));
//var_dump($b); exit;

  //echo $this->Form->input('Tag.Tag',array('multiple' => 'multiple'));
     
//echo $this->Form->input('Tag.Tag', array('label' => 'Tag',)); 
//echo $this->Form->input('tag', array('multiple' => true, ));
//cho $this->html->selectTag('Tag/Tag', $tags, null, array('multiple' => 'multiple'));

/*
$this->extend('/Common/view');
$this->start('sidebar');
echo "<li class='active'>" . $this->Html->link('Ptyjugs',
       array('controller' => 'posts', 'action' => 'index',)
       ) ."</li>"; 
echo $this->element('sidebar/recent_topics');
echo $this->prepend('sidebar', 'this content goes on top of sidebar');
$this->end(); 
$this->append('sidebar');
echo $this->element('sidebar/popular_topics');
$this->end(); ?> */ 

?>
