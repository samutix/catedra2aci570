<?php

class RewardsController extends AppController {
	
	private $errorMessage = "Premio invalido o no tienes los permisos necesarios.";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('rewards', $this->Reward->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('reward', $reward);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Reward->create();
			if($this->Reward->save($this->request->data)) {
				$this->Session->setFlash('El premio se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el premrio 8(.');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Reward->id = $id;
			if($this->Reward->save($this->request->data)) {
				$this->Session->setFlash('Premio actualizado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el premio');
		}
		
		if(!$this->request->data) {
			$this->request->data = $reward;
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Reward->delete($id)) {
			$this->Session->setFlash('El premio '.h($reward['Reward']['description']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
