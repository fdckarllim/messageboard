<?php 

App::uses('AppController', 'Controller');

/**
* 
*/
class ClientsController extends AppController
{
	public $uses = array(
		'Principal',
		'Client'
		);	
	public $components = array('Paginator');
	var $helpers = array('Radio');
	
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
		if ($this->request->is('post') && $this->request->data['submit'] == 'addclient') {
			$this->request->data['User']['created_ip'] = $this->request->clientIp();
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$client_id = $this->Client->getLastInsertId();
				return $this->redirect(array('controller' => 'clients', 'action' => 'add?step=2&client_id='.$client_id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else if ($this->request->is('post') && $this->request->data['submit'] == 'addprincipal') {
			$this->request->data['User']['created_ip'] = $this->request->clientIp();
			$this->request->data['Principal']['client_id'] = $this->Client->getLastInsertId();
			$this->Principal->create();
			if ($this->Principal->save($this->request->data)) {
				return $this->redirect(array('controller' => 'pages', 'action' => 'success'));
			} else {
				$this->Session->setFlash(__('The principal could not be saved. Please, try again.'));
			}
		}
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