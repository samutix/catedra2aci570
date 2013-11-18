<h1>Editar categoria</h1>
<br><br>
<?php

echo $this -> Form -> create('Category');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('name');
echo $this -> Form -> input('is_active');
echo $this -> Form -> end('Guardar categoria');
?>
<br><br>
<p><?php echo $this -> Html -> link('Volver', array('admin' => true, 'action' => 'index')); ?></p>