<h1>Editar mensaje</h1>
<br><br>
<?php

echo $this -> Form -> create('Message');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('project_id');
echo $this -> Form -> input('subject');
echo $this -> Form -> input('message');
echo $this -> Form -> end('Guardar mensaje');
?>
<br><br>
<p><?php echo $this -> Html -> link('Volver', array('admin' => true, 'action' => 'index')); ?></p>