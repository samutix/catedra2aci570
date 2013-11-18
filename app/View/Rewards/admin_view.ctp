<h1>Premio para el proyecto : <?php echo h($reward['Project']['name']) ?></h1>
<br><br>
<p>Id : <?php echo h($reward['Reward']['id']) ?></p>
<p>Descripcion : <?php echo h($reward['Reward']['description']) ?></p>
<p>Maximo permitido : <?php echo $reward['Reward']['max_allowed'] ?></p>
<p>Cantidad : <?php echo $reward['Reward']['amount'] ?></p>
<p>Orden : <?php echo $reward['Reward']['order'] ?></p>
<p><small>Creado : <?php echo $reward['Reward']['created'] ?></small></p>
<p><small>Modificado : <?php echo $reward['Reward']['modified'] ?></small></p>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>