<h1>Proyectos</h1>

<table class="table table-bordered">
	<tr>
		<th>id</th>
		<th>Proyecto</th>
		<th>Usuario</th>
		<th>Categoria</th>
		<th>Mini descripcion</th>
		<th>Descripcion</th>
		<th>Fecha inicio</th>
		<th>Fecha termino</th>
		<?php 
		echo ($loggedIn) ? "<th>Accion</th>" : '';
		?>
	</tr>
	<?php foreach($projects as $project): ?>
		<tr>
			<td><?php echo $project['Project']['id']; ?></td>
			<td><?php echo $project['Project']['name']; ?></td>
			<td><?php echo $project['User']['email']; ?></td>
			<td><?php echo $this -> Html -> link($project['Category']['name'], array('admin' => false, 'controller' => 'categories', 'action' => 'edit', $project['Category']['id'])); ?></td>
			<td><?php echo $project['Project']['short_description']; ?></td>
			<td><?php echo $this->Text->truncate(
				$project['Project']['long_description'],
				60, 
				array('ellipsis' => '...', 'exact' => true)
			); ?></td>
			<td><?php echo $project['Project']['start_date']; ?></td>
			<td><?php echo $project['Project']['end_date']; ?></td>
			<td><?php echo (isset($user) && $user['id'] === $project['User']['id']) ? $this->Html->link("Edit", array('controller' => 'projects', 'action' => 'edit', $project['Project']['id'])) : ''; ?></td>
		</tr>
	<?php endforeach; ?>
</table>