<!-- app/View/Users/view.ctp -->

<div class="page-header"><h1>Details</h1></div>


<h3>Id: <?php echo h($user['User']['id']); ?></h3>

<h3>Username: <?php echo h($user['User']['username']); ?></h3>

<p><small>Created: <?php echo $user['User']['created']; ?></small></p>

<h3>Role: <?php echo h($user['User']['role']); ?></h3>


