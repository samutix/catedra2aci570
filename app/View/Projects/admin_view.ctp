<h1>Proyecto : <?php echo h($project['Project']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($project['Project']['id']) ?></p>
<p>Nombre : <?php echo h($project['Project']['name']) ?></p>
<p>Usuario : <?php echo h($project['User']['first_name'].' '.$project['User']['last_name']) ?></p>
<p>Categoria : <?php echo h($project['Category']['name']) ?></p>
<p>Fecha inicio : <?php echo h($project['Project']['start_date']) ?></p>
<p>Fecha termino : <?php echo h($project['Project']['end_date']) ?></p>
<p>Activa : <?php echo ($project['Project']['is_active']) ? 'Si' : 'No'; ?></p>
<p>Mini descripcion : <?php echo h($project['Project']['short_description']) ?></p>
<p>Descripcion detallada:</p><p><?php echo h($project['Project']['long_description']) ?></p>
<p><small>Creado : <?php echo h($project['Project']['created']) ?></small></p>
<p><small>Modificado : <?php echo h($project['Project']['modified']) ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>