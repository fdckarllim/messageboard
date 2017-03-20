<?php


App::uses('AppController', 'Controller');


class MessagesController extends AppController {

	public $uses = array();	

	public $components = array('Paginator');


	public function index() {
		$uid = AuthComponent::user('id');
		// $this->Message->recursive = 0;
		$res = $this->Message->find('all', array(
			'conditions' => array(
				'OR' => array(
					'from_id' => $uid,
					'to_id' => $uid 
				)
			)
		));
		$this->set('messages', $res);
	}

	public function add(){
		
	}
}
