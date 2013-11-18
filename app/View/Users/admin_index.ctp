<h1>Usuarios</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Activo</th>
		<th>Admin</th>
		<th>Creado</th>
		<th>Modificado</th>
		<th>Acci&oacute;n</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach($users as $user): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($user['User']['id']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['email']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['first_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($user['User']['last_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo ($user['User']['is_active']) ? 'yes' : 'no'; ?></td>
		<td><?php echo ($user['User']['is_admin']) ? 'yes' : 'no'; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo $user['User']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Editar',
			array(
				'controller' => 'users', 'action' => 'edit',
				$user['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $user['User']['id']),
			array('confirm' => 'Eliminar al usuario '.$user['User']['first_name'].' '.$user['User']['last_name'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>

<p><?php echo $this->Html->link('Agregar usuario', array('admin' => true, 'controller' => 'users', 'action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Volver ACP', array('admin' => false, 'controller' => 'admin', 'action' => 'index')); ?></p>






