<h1>Notificaciones</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Mensaje asunto</th>
		<th>Usuario</th>
		<th>Visto</th>
		<th>Creado</th>
		<th>Modificado</th>
		<th>Acci&oacute;n</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach($notifications as $notification): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($notification['Notification']['id']),
			array(
				'controller' => 'notifications', 'action' => 'view',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($notification['Message']['subject']),
			array(
				'controller' => 'messages', 'action' => 'view',
				$notification['Message']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($notification['User']['email']),
			array(
				'controller' => 'users', 'action' => 'view',
				$notification['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			($notification['Notification']['viewed']) ? 'Si' : 'No',
			array(
				'controller' => 'notifications', 'action' => 'view',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $notification['Notification']['created']; ?></td>
		<td><?php echo $notification['Notification']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Editar',
			array(
				'controller' => 'notifications', 'action' => 'edit',
				$notification['Notification']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $notification['Notification']['id']),
			array('confirm' => 'Eliminar notificacion con id '.$notification['Notification']['id'].' del usuario "'.$notification['User']['email'].'"?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($notification); ?>
</table>

<p><?php echo $this->Html->link('Agregar notificacion', array('admin' => true, 'action' => 'add')); ?></p>

<p><?php echo $this->Html->link('Volver ACP', array('admin' => false, 'controller' => 'admin', 'action' => 'index')); ?></p>





