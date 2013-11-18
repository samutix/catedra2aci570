<h1>Perfil : <?php echo h($usuario['User']['first_name']), " ", h($usuario['User']['last_name']) ?></h1>
<br><br>
<p>Id : <?php echo h($usuario['User']['id']) ?></p>
<p>Email : <?php echo h($usuario['User']['email']) ?></p>
<p>First name : <?php echo h($usuario['User']['first_name']) ?></p>
<p>Last name : <?php echo h($usuario['User']['last_name']) ?></p>
<p>Active : <?php echo ($usuario['User']['is_active']) ? 'yes' : 'no'; ?></p>
<p>Admin : <?php echo ($usuario['User']['is_admin']) ? 'yes' : 'no'; ?></p>
<p><small>Created : <?php echo h($usuario['User']['created']) ?></small></p>
<p><small>Modified : <?php echo h($usuario['User']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('controller' => 'users', 'action' => 'index')); ?></p>