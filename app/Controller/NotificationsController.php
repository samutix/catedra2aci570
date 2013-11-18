<?php

class NotificationsController extends AppController {
	
	private $errorNotification = "Notificacion invalido o no tienes los permisos necesarios.";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		$this->set('notifications', $this->Notification->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		$this->set('notification', $notification);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		if($this->request->is('post')) {
			$this->Notification->create();
			if($this->Notification->save($this->request->data)) {
				$this->Session->setFlash('La notificacion se ha guardado con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede crear la notificacion 8(.');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Message');
			$this->loadModel('User');
			
			$this->set('messages', $this->Message->find('list', array(
				'fields' 		=> array('id', 'subject')
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email')
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Notification->id = $id;
			if($this->Notification->save($this->request->data)) {
				$this->Session->setFlash('Notificacion actualizada con exito!.');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('No se puede actualizar la notificacion');
		}
		
		if(!$this->request->data) {
			$this->request->data = $notification;
			$this->loadModel('Message');
			$this->loadModel('User');
			
			$this->set('messages', $this->Message->find('list', array(
				'fields' 		=> array('id', 'subject')
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email')
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		if($this->Notification->delete($id)) {
			$this->Session->setFlash('La notificacion con id '.$notification['Notification']['id'].' del mensaje '.h($notification['Message']['subject']).' ha sido removido con exito!.');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
