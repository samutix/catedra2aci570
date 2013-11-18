<h1>Premios</h1>
<table class="table">
	<tr>
		<th>Id</th>
		<th>Proyecto</th>
		<th>Descripcion</th>
		<th>Maximo permitido</th>
		<th>Cantidad</th>
		<th>Orden</th>
		<th>Creado</th>
		<th>Modificado</th>
		<th>Acci&oacute;n</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach($rewards as $reward): ?>
	<tr>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['id']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Project']['name']),
			array(
				'controller' => 'projects', 'action' => 'view',
				$reward['Project']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['description']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['max_allowed']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['amount']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Html->link(
			h($reward['Reward']['order']),
			array(
				'controller' => 'rewards', 'action' => 'view',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $reward['Reward']['created']; ?></td>
		<td><?php echo $reward['Reward']['modified']; ?></td>
		<td><?php echo $this->Html->link(
			'Editar',
			array(
				'controller' => 'rewards', 'action' => 'edit',
				$reward['Reward']['id']
			)
		); ?></td>
		<td><?php echo $this->Form->postLink(
			'Delete',
			array('action' => 'delete', $reward['Reward']['id']),
			array('confirm' => 'Eliminar el premio para el proyecto '.$reward['Project']['name'].'?')
		); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($project); ?>
</table>

<p><?php echo $this->Html->link('Agregar proyecto', array('admin' => true, 'action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Volver ACP', array('admin' => false, 'controller' => 'admin', 'action' => 'index')); ?></p>