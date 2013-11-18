<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
	
	public $helpers		= array('Html', 'Form');
	
	public $components	= array('Session', 'Auth' => array(
		'loginAction' => array(
			'admin'			=> false,
			'controller'	=> 'users',
			'action'		=> 'login'
		),
		'loginRedirect' => array(
			'admin'			=> false,
			'controller'	=> 'pages',
			'action'		=> 'index'
		),
		'logoutRedirect' => array(
			'admin'			=> false,
			'controller'	=> 'pages',
			'action'		=> 'index'
		),
		'authError' => 'No estás permitido a ver ésta área',
		'authenticate' => array(
			'Form' => array(
				'fields' => array(
					'username' => 'email'
				)
			)
		)
	));
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$user = $this->Auth->user();
		
	    if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin' && $this->isAuthorized()) {
	        $this->layout = 'admin';
	    }
	}
	
	public function beforeRender() {
		
		$loggedIn	= null;
		$user		= null;
		
		if($loggedIn = $this->Auth->loggedIn()) {
			$user = $this->Auth->user();
		}
		
		$this->set('loggedIn', $loggedIn);
		$this->set('user', $user);
	}
	
	public function isAuthorized() {
		$user = $this->Auth->user();
		
		return ($user['is_active'] && $user['is_admin']) ? true : false;
	}
	
	public function isActive() {
		$user = $this->Auth->user();
		
		return ($user['is_active']) ? true : false;
	}

	public function isPropietary($project_id) {
		$user = $this->Auth->user();
		
		if($this->Project->find('first', array(
			'conditions'	=> array(
				'Project.user_id' => $user['id'],
				'Project.id' => $project_id
			)
		))) {
			return true;
		}
		
		return false;
	}
}
