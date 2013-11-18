<h1>Contribuidor : <?php echo h($contributor['User']['first_name'].' '.$contributor['User']['last_name']) ?></h1>
<br><br>
<p>Id : <?php echo h($contributor['Contributor']['id']) ?></p>
<p>Usuario : <?php echo $this->Html->link(
	h($contributor['User']['first_name'].' '.$contributor['User']['last_name']),
	array(
		'controller' => 'users', 'action' => 'view',
		$contributor['User']['id']
	)
); ?></p>
<p>Premio : <?php echo $this->Html->link(
	h($contributor['Reward']['description']),
	array(
		'controller' => 'rewards', 'action' => 'view',
		$contributor['Reward']['id']
	)
); ?></p>
<p>Cantidad : <?php echo ($contributor['Contributor']['amount']); ?></p>
<p><small>Creada : <?php echo h($contributor['Contributor']['created']) ?></small></p>
<p><small>Modificada : <?php echo h($contributor['Contributor']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>