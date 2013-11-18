<h1>Notificacion al usuario : <?php echo h($notification['User']['email']) ?></h1>
<br><br>
<p>Id : <?php echo h($notification['Notification']['id']) ?></p>
<p>Mensaje : <?php echo $this->Html->link(
	h($notification['Message']['subject']),
	array(
		'controller' => 'messages', 'action' => 'view',
		$notification['Message']['id']
	)
); ?></p>
<p>Usuario : <?php echo $this->Html->link(
	h($notification['User']['email']),
	array(
		'controller' => 'users', 'action' => 'view',
		$notification['User']['id']
	)
); ?></p>
<p>Visto : <?php echo ($notification['Notification']['viewed']) ? 'Si' : 'No' ?></p>

<p><small>Creado : <?php echo h($notification['Notification']['created']) ?></small></p>
<p><small>Modificado : <?php echo h($notification['Notification']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>