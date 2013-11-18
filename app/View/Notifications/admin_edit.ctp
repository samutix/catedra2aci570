<h1>Editar notificacion</h1>
<br><br>
<?php

echo $this -> Form -> create('Notification');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('message_id');
echo $this -> Form -> input('user_id');
echo $this -> Form -> input('viewed');
echo $this -> Form -> end('Guardar notificacion');
?>
<br><br>
<p><?php echo $this -> Html -> link('Volver', array('admin' => true, 'action' => 'index')); ?></p>