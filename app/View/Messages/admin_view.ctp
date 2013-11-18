<h1>Mensaje : <?php echo h($message['Message']['subject']) ?></h1>
<br><br>
<p>Id : <?php echo h($message['Message']['id']) ?></p>
<p>Proyecto : <?php echo $this->Html->link(
			h($message['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$message['Project']['id']
			)
		); ?></p>
<p>Asunto : <?php echo h($message['Message']['subject']) ?></p>
<p>Mensaje : </p><p><?php echo h($message['Message']['message']) ?></p>

<p><small>Creado : <?php echo h($message['Message']['created']) ?></small></p>
<p><small>Modificado : <?php echo h($message['Message']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>