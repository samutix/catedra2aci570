<?php

class CategoriesController extends AppController {
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function index() {
		$this->set('categories', $this->Category->find('all'));
	}
	
	public function edit($id = null) {
		if((!$id || !$this->Auth->loggedIn() || !$category = $this->Category->findById($id))) {
			throw new NotFoundException('Categoria invalida.');
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Category->id = $id;
			if($this->Category->save($this->request->data)) {
				$this->Session->setFlash('Categoria actualizada con exito!.');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar la categoria');
		}
		
		if(!$this->request->data) {
			$this->request->data = $category;
		}
	}

	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('categories', $this->Category->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('Usuario invalido.');
		}
		
		$this->set('categories', $category);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		if($this->request->is('post')) {
			$this->Category->create();
			if($this->Category->save($this->request->data)) {
				$this->Session->setFlash('La categoria se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear la categoria 8(.');
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('Categoria invalida.');
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Category->id = $id;
			if($this->Category->save($this->request->data)) {
				$this->Session->setFlash('Categoria actualizada con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar la categoria');
		}
		
		if(!$this->request->data) {
			$this->request->data = $category;
		}
	}

	public function admin_delete($id = null) {
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('Categoria invalida.');
		}
		
		if($this->Category->delete($id)) {
			$this->Session->setFlash('La categoria '.h($category['Category']['name']).' ha sido removida con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
