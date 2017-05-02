<?php 

App::uses('AppController', 'Controller');

/**
* 
*/
class ClientsController extends AppController
{
	public $uses = array(
		'Client',
		'Principal',
		'Payment',
		'Advance'
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

		$principal = $this->getClientPrincipal($id);
		$transactions = $this->getClientTransactions($id);
		// echo "<pre>";
		// var_dump($transactions);
		// exit();
		$age = $this->getage($client['Client']['birthdate']);
		$this->set('principal', isset($principal['Principal']) ? $principal['Principal'] : '');
		$this->set('clientAge', $age);
		$this->set('client', $client['Client']);
		if ($this->request->is('post') && $this->request->data['submit'] == 'addprincipal') {
			if ($id) {
				$previous_lend = $this->Principal->find('all', array(
						'fields' => 'Principal.id',
						'conditions' => array(
								'Principal.client_id' => $id,
								'Principal.paid_flg' => 0
							),
						'recursive' => -1
					)
				);
				if (isset($previous_lend) && $previous_lend) {
					$this->Session->setFlash(__('Please settle previous lend before adding another one.'), 'default', array('class' => 'alert alert-danger'));
				}
				else {
					$this->request->data['User']['created_ip'] = $this->request->clientIp();
					$pdata = $this->request->data['Principal'];
					$borrow_date = $pdata['borrow_date']['year']."-".$pdata['borrow_date']['month']."-".$pdata['borrow_date']['day'];
					$this->request->data['Principal']['due_date'] = Date("Y-m-d", strtotime( $borrow_date."+".$pdata['months_to_pay']." Month"));
					$this->request->data['Principal']['client_id'] = $id;

					$this->Principal->create();
					if ($this->Principal->save($this->request->data)) {
						return $this->redirect(array('action' => 'details', $id));
					} else {
						$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
				}
			} else {
				$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
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

			$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : false;
			if ($client_id) {
				$previous_lend = $this->Principal->find('all', array(
						'fields' => 'Principal.id',
						'conditions' => array(
								'Principal.client_id' => $client_id,
								'Principal.paid_flg' => 0
							),
						'recursive' => -1
					)
				);
				if (isset($previous_lend) && $previous_lend) {
					$this->Session->setFlash(__('Please settle previous lend before adding another one.'), 'default', array('class' => 'alert alert-danger'));
				}
				else {
					$this->request->data['User']['created_ip'] = $this->request->clientIp();
					$pdata = $this->request->data['Principal'];
					$borrow_date = $pdata['borrow_date']['year']."-".$pdata['borrow_date']['month']."-".$pdata['borrow_date']['day'];
					$this->request->data['Principal']['due_date'] = Date("Y-m-d", strtotime( $borrow_date."+".$pdata['months_to_pay']." Month"));
					$this->request->data['Principal']['client_id'] = $client_id;

					$this->Principal->create();
					if ($this->Principal->save($this->request->data)) {
						return $this->redirect(array('controller' => 'pages', 'action' => 'success'));
					} else {
						$this->Session->setFlash(__('The principal could not be saved. Please, try again.'));
					}
				}
			} else {
				$this->Session->setFlash(__('The principal could not be saved. Please, try again.', ['params' => ['class' => 'alert alert-danger']]));
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

	public function getClientPrincipal($id){
		$principal = $this->Principal->find('first', array(
				'conditions' => array(
					'Principal.client_id' => $id,
					'Principal.paid_flg' => 0
				),
				'recursive' => -1
			)
		);
		return $principal;
	}

	public function getClientTransactions($id){
		$transactions = $this->Client->find('all', array(
				'fields' => array(
					'Client.id',
					'Principal.*',
				),
				'conditions' => array(
					'Client.id' => $id
				),
				'joins' => array(
					array(
						'table' => 'principals',
						'alias' => 'Principal',
						'type' => 'LEFT',
						'conditions' => 'Client.id = Principal.client_id'
					)
				),
				'recursive' => -1
			)
		);
		return $transactions;
	}
}