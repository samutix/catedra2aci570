<?php

class UsersController extends AppController {
	
	private $errorMessage = "Usuario invalido o no tienes los permisos necesarios.";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
		$this->Auth->allow('login', 'register');
	}
	
	public function login() {
		if ($this->request->is('post')) {
	        if ($this->Auth->login() && $this->isActive()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        else {
	            $this->Session->setFlash('Nombre de usuario o password incorrecto');
	        }
	    }
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function register() {
		if($this->request->is('post')) {
			$this->User->create();
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('Te has registrado con exito!.');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el usuario 8(.');
		}
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		$this->set('users', $this->User->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('usuario', $user);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->User->create();
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('El usuario se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el usuario 8(.');
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->User->id = $id;
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('Usuario editado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el usuario');
		}
		
		if(!$this->request->data) {
			$this->request->data = $user;
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->User->delete($id)) {
			$this->Session->setFlash('El usuario '.h($user['User']['first_name']).' '.h($user['User']['last_name']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
