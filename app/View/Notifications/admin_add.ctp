<h1>Agregar notificacion</h1>
<br><br>
<?php

echo $this->Form->create('Notification');
echo $this->Form->input('message_id');
echo $this->Form->input('user_id');
?>
<div style="display: inline-block"><?=$this->Form->input('viewed');?></div>
<?php
echo $this->Form->end('Guardar notificacion');

?>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>