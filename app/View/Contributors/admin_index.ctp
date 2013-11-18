<h1>Contribuidores</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Usuario</th>
		<th>Premio</th>
		<th>Cantidad</th>
		<th>Creado</th>
		<th>Modificado</th>
		<th>Acci&oacute;n</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach($contributors as $contributor): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($contributor['Contributor']['id']),
			array(
				'controller' => 'contributors', 'action' => 'view',
				$contributor['Contributor']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($contributor['User']['first_name'].' '.$contributor['User']['last_name']),
			array(
				'controller' => 'users', 'action' => 'view',
				$contributor['User']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($contributor['Reward']['description']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$contributor['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($contributor['Contributor']['amount']),
			array(
				'controller' => 'contributors', 'action' => 'view',
				$contributor['Contributor']['id']
			)
		); ?></td>
		<td><?php echo $contributor['Contributor']['created']; ?></td>
		<td><?php echo $contributor['Contributor']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Editar',
			array(
				'controller' => 'contributors', 'action' => 'edit',
				$contributor['Contributor']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $contributor['Contributor']['id']),
			array('confirm' => 'Eliminar contribuidor del usuario'.$contributor['User']['email'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($contributor); ?>
</table>

<p><?php echo $this->Html->link('Agregar contribuidor', array('admin' => true, 'action' => 'add')); ?></p>

<p><?php echo $this->Html->link('Volver ACP', array('admin' => false, 'controller' => 'admin', 'action' => 'index')); ?></p>



