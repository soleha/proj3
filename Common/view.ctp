
<?php // echo $this->fetch('title'); ?>
  <div class="row">
    <div class="span3 bs-docs-sidebar">
      <ul class="nav nav-list bs-docs-sidenav">
       
      <?php //echo $this->fetch('sidebar'); 
      echo "<li class='active'>" . $this->Html->link('Posts',
       array('controller' => 'posts', 'action' => 'index',)
       ) ."</li>"; 
      echo "<li>". $this->Html->link('Add Post',
      array('controller' => 'posts' ,'action' => 'add',)
       ) ."</li>";
      echo"<li>". $this->Html->link('Tag',
              array('controller' => 'tags', 'action' => 'index', )
              )."</li>";
     
  
      echo $this->fetch('sidebar'); 
      ?>
      </ul>
    </div>
    <div class="span1"></div>
    <div class="span8">
      <?php echo $this->fetch('content'); ?>
    </div>
  </div>

