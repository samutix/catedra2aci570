<?php

App::uses('AppController', 'Controller');


class PagesController extends AppController {


	public $uses		= array();
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	public function index() {
		$this->loadModel('Project');
			
		$this->set('projects', $this->Project->find('all', array(
			'fields' 		=> array(
									'Project.id', 'Project.name', 'Project.short_description', 'Project.long_description', 'Project.start_date', 'Project.end_date',
									'User.id', 'User.email',
									'Category.id', 'Category.name'
								),
			'conditions'	=> array(
								'Project.is_active'	=> true,
								'User.is_active'	=> true,
								'Category.is_active'=> true
								)
		)));
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
	}
}
