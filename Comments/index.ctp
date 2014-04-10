<table>
  <?php foreach  ($comments as $comment): ?>
  <tr>
    <td> <?php echo $this->Html->link( $comment['Comment']['id'], array(
            'controller' => 'comments', 'action' => 'view', $comment['Comment']['id'])); ?></td>

    <td><?php echo $comment['Comment']['comment']; ?></td>
    <td><?php echo $comment['Comment']['created']; ?></td>

  <?php endforeach ?>
 
</table>