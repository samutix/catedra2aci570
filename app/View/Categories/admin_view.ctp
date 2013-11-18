<h1>Categoria : <?php echo h($categories['Category']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($categories['Category']['id']) ?></p>
<p>Nombre : <?php echo h($categories['Category']['name']) ?></p>
<p>Activa : <?php echo ($categories['Category']['is_active']) ? 'yes' : 'no'; ?></p>
<p><small>Creada : <?php echo h($categories['Category']['created']) ?></small></p>
<p><small>Modificada : <?php echo h($categories['Category']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>