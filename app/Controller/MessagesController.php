<?php

class MessagesController extends AppController {
	
	private $errorMessage = "\"mensaje\" invalido o no tienes los permisos necesarios.";

	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		$this->set('messages', $this->Message->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('message', $message);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Message->create();
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash('El mensaje se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear el mensaje 8(.');
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
		
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Message->id = $id;
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash('mensaje actualizado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar el mensaje');
		}
		
		if(!$this->request->data) {
			$this->request->data = $message;
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Message->delete($id)) {
			$this->Session->setFlash('El mensaje '.h($message['message']['subject']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
