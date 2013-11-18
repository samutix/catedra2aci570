<h1>Agregar categoria</h1>
<br><br>
<?php

echo $this->Form->create('Project');
echo $this->Form->input('category_id');
echo $this->Form->input('user_id');
echo $this->Form->input('name');
echo $this->Form->input('short_description');
echo $this->Form->input('long_description');
echo $this->Form->input('start_date');
echo $this->Form->input('end_date');
?>
<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
<?php
echo $this->Form->end('Guardar Proyecto');

?>
<br><br>
<p><?php echo $this->Html->link('Volver', array('admin' => true, 'action' => 'index')); ?></p>

<?php print_r($users); ?>