<?php

$cakeDescription = "Pagina principal";
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

		echo $this->Html->css('bootstrap.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 class="text-center"><?php echo $this->Html->link('Pagina principal', array('admin' => false, 'controller' => 'pages', 'action' => 'index')); ?></h1>
			<p>
				<?php echo ($loggedIn && $user['is_active']) ? 
				"Logeado como: ".$user['email']."<br /><br />".$this->Html->link('Logout', array('admin' => false, 'controller' => 'users', 'action' => 'logout')).
				'<br /><br />'.
				'<p>'.$this->Html->link('Editar categorias', array('admin' => false, 'controller' => 'categories', 'action' => 'index')).'</p>'
				
				: 
				
				$this->Html->link('Login', array('admin' => false, 'controller' => 'users', 'action' => 'login')).
				'<br /><br />'.
				$this->Html->link('Register', array('admin' => false, 'controller' => 'users', 'action' => 'register'));				
				?>
			</p>
			<p class="text-center">
				<?php echo ($loggedIn && $user['is_active'] && $user['is_admin']) ?
				$this->Html->link('ACP', array('admin' => true, 'controller' => 'pages', 'action' => 'index')) : '';
				?>
			</p>
			<br><br>
			
		</div>
		<div id="content" class="text-center">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="text-center">
			ACI570 - Proyecto de Desarrollo
		</div>
	</div>
</body>
</html>
