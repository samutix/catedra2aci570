<?php

class ProjectsController extends AppController {
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function edit($id = null) {
		if((!$id || !$this->Auth->loggedIn() || !$proyect = $this->Project->findById($id)) || !$this->isPropietary($id)) {
			throw new NotFoundException();
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Project->id			= $id;
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('Proyecto actualizado con exito!.');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el proyecto');
		}
		
		if(!$this->request->data) {
			$this->request->data = $proyect;
			$this->loadModel('Category');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('projects', $this->Project->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$project = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('Usuario invalido.');
		}
		
		$this->set('project', $project);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		if($this->request->is('post')) {
			$this->Project->create();
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('El proyecto se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el proyecto 8(.');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Category');
			$this->loadModel('User');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));	
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$proyect = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('Categoria invalida.');
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Project->id = $id;
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('Proyecto actualizado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el proyecto');
		}
		
		if(!$this->request->data) {
			$this->request->data = $proyect;
			$this->loadModel('Category');
			$this->loadModel('User');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$proyect = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('Categoria invalida o no tiene los permisos necesarios.');
		}
		
		if($this->Project->delete($id)) {
			$this->Session->setFlash('El proyecto '.h($proyect['Project']['name']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
