
<div id="table">
  <div class="container">

  <div class="page-header"><h2><center> Posts</center> </h2></div>

    <table class ="table table-hover" >

      <tr>
        <th>Id</th> 
        <th>Title</th>
        <?php  if ($this->Session->check('username')) :
        echo "<th>"; ?> 
        Actions
        <?php echo "</th>";
        endif ?>
        <th>Created</th>
      </tr>
      <?php foreach ($posts as $post): ?>
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
              'Edit',
              array('action' => 'edit', $post['Post']['id'])
            );
            echo" ";
            echo $this->Html->link(
              'Delete',
              array('action' => 'delete', $post['Post']['id']),
              array( 'class'=>'confirm_delete')
            );
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
      <?php unset($post); 

      echo $this->form->create("Post",array('action' => 'search'));
      echo $this->form->input("q", array('label' => 'Search for'));
      echo $this->form->end("Search");

      ?>
    </table>
  </div>
</div>


