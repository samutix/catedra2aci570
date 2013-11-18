
<div class="text-center">
	<h1>Editar categoria</h1>
	<br><br>
	<?php
	echo $this -> Form -> create('Category');
	echo $this -> form -> input('id', array('type' => 'hidden'));
	?>
	<div style="display: inline-block"><?=$this->Form->input('is_active');?></div>
	<?php
	echo $this -> Form -> end('Guardar categoria');
	?>
	<br><br>
	<p><?php echo $this -> Html -> link('Volver', array('admin' => false, 'controller' => 'pages', 'action' => 'index')); ?></p>
	
</div>
