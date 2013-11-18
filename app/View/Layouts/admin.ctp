<?php

$cakeDescription = 'Admin CP';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('bootstrap-responsive.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 class="text-center"><?php echo $this->Html->link($cakeDescription, array('admin' => false, 'controller' => 'admin', 'action' => 'index')); ?></h1>
			<p>
				<?php echo ($loggedIn) ? "Logeado como: ".$user['email']."<br /><br />".$this->Html->link('Logout', array('admin' => false, 'controller' => 'users', 'action' => 'logout')) : '' ?>
			</p>
			<p class="text-center"><?php echo $this->Html->link('Pagina principal', array('admin' => false, 'controller' => 'pages', 'action' => 'index')); ?></p>
			<br />
			<ul class="text-center unstyled inline">
				<li><?php echo $this->Html->link('Categorias', array('admin' => true, 'controller' => 'categories', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Contribuidores', array('admin' => true, 'controller' => 'contributors', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Mensajes', array('admin' => true, 'controller' => 'messages', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Notificaciones', array('admin' => true, 'controller' => 'notifications', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Proyectos', array('admin' => true, 'controller' => 'projects', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Premios', array('admin' => true, 'controller' => 'rewards', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Usuarios', array('admin' => true, 'controller' => 'users', 'action' => 'index')); ?></li>
			</ul>
			<br />
		</div>
		<div id="content"  class="text-center">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="text-center">
			ACI570 - Proyecto de Desarrollo
		</div>
	</div>
</body>
</html>
