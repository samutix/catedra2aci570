<h1>Editar categoria</h1>
<br><br>
<?php

echo $this -> Form -> create('Contributor');
echo $this -> form -> input('id', array('type' => 'hidden'));
echo $this -> Form -> input('user_id');
echo $this -> Form -> input('reward_id');
echo $this -> Form -> input('amount');
echo $this -> Form -> end('Guardar contribuidor');
?>
<br><br>
<p><?php echo $this -> Html -> link('Volver', array('admin' => true, 'action' => 'index')); ?></p>