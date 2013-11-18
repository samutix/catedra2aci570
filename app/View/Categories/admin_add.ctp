<h1>Agregar categoria</h1>
<br><br>
<?php

echo $this->Form->create('Category');
echo $this->Form->input('name');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
<?php
echo $this->Form->end('Guardar categoria');
?>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>