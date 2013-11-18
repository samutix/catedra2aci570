<?php

class ContributorsController extends AppController {
	
	private $errorMessage = "\"Contribuidor\" invalido o no tienes los permisos necesarios.";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('contributors', $this->Contributor->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$contributor = $this->Contributor->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('contributor', $contributor);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Contributor->create();
			if($this->Contributor->save($this->request->data)) {
				$this->Session->setFlash('El contribuidor se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el contribuidor 8(.');
		}
		
		if(!$this->request->data) {
			$this->loadModel('User');
			$this->loadModel('Reward');
			
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('rewards', $this->Reward->find('list', array(
				'fields' 		=> array('id', 'description')
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$contributor = $this->Contributor->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Contributor->id = $id;
			if($this->Contributor->save($this->request->data)) {
				$this->Session->setFlash('Contribuidor actualizado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el contribuidor');
		}
		
		if(!$this->request->data) {
			$this->request->data = $contributor;
			$this->loadModel('User');
			$this->loadModel('Reward');
			
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('rewards', $this->Reward->find('list', array(
				'fields' 		=> array('id', 'description')
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$contributor = $this->Contributor->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Contributor->delete($id)) {
			$this->Session->setFlash('El premio '.h($contributor['Contributor']['description']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
