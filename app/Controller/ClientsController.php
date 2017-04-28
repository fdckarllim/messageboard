<?php 

App::uses('AppController', 'Controller');

/**
* 
*/
class ClientsController extends AppController
{
	public $uses = array();	
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function index() {
		$this->layout = 'admin';
		$clients = $this->Client->find('all');
		$this->set('clients', $clients);
	}	

	public function details($id) {
		$this->layout = 'admin';
		$client = $this->Client->find('first', array(
				'conditions' => array(
					'Client.id' => $id
				),
				'recursive' => -1
			)
		);
		$age = $this->getage($client['Client']['birthdate']);
		$this->set('clientAge', $age);
		$this->set('client', $client['Client']);
	}
	public function add() {
		$this->layout = 'admin';
	}

	public function getage($dateofbirth){
		$date = new DateTime($dateofbirth);
		$now = new DateTime();
		$interval = $now->diff($date);
		return $interval->y;
	}
    public function activelink($controller){
        if ($this->params['controller'] == $controller) {
            echo 'menu-top-active';
        }
    }
}