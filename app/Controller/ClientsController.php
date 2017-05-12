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
		'Advance',
		'Transaction'
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
		$this->set('transactions', $this->getClientTransactions($id));
		$principal = $this->getClientPrincipal($id);

		$age = $this->getage($client['Client']['birthdate']);
		$this->set('principal', isset($principal['Principal']) ? $principal['Principal'] : '');
		$this->set('clientAge', $age);
		$this->set('client', $client['Client']);

		if ($this->request->is('post')) {
			switch ($this->request->data['submit']) {
				case 'addprincipal':
					$this->addPrincipal($id, $this->request->data);
					break;
				case 'addpayment':
					$this->addPayment($id, $this->request->data);
					break;
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
		$transactions = $this->Transaction->find('all', array(
				'conditions' => array(
					'Transaction.client_id' => $id
				),
				'recursive' => -1
			)
		);
		return $transactions;
	}
	public function getInterest($amount, $months_to_pay){
		if ($amount && $months_to_pay) {
			return $interest = $amount * (.1 * $months_to_pay);
		} else {
			return false;
		}
	}
	public function getBalance($client_id, $newAmount){
		if ($client_id && $newAmount) {
			return $balance = $newAmount;
		} else {
			return false;
		}
	}
	public function addPrincipal($id, $requestdata){
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
				$transdata = $requestdata['Principal'];
				$interest = $this->getInterest($transdata['amount'], $transdata['months_to_pay']);
				$balance = $this->getBalance($id, $transdata['amount'] + $interest);
				$transaction['Transaction'] = array(
						'client_id' => $id,
						'amount' => $transdata['amount'],
						'type' => 1,
						'interest' => $interest,
						'balance' => $balance
					);

				$pdata = $requestdata['Principal'];
				$borrow_date = $pdata['borrow_date']['year']."-".$pdata['borrow_date']['month']."-".$pdata['borrow_date']['day'];
				$requestdata['Principal']['due_date'] = Date("Y-m-d", strtotime( $borrow_date."+".$pdata['months_to_pay']." Month"));
				$requestdata['Principal']['client_id'] = $id;

				$this->Principal->create();
				if ($this->Principal->save($requestdata)) {
					$this->Transaction->save($transaction);
					return $this->redirect(array('action' => 'details', $id));
				} else {
					$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}


			}
		} else {
			$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function addPayment($id, $requestdata){
		if ($id) {
				$transdata = $requestdata['Payment'];
				$balance = $this->getBalance($id, $transdata['amount']);
				$transaction['Transaction'] = array(
						'client_id' => $id,
						'amount' => $transdata['amount'],
						'type' => 3,
						'interest' => null,
						'balance' => $balance
					);

			$requestdata['Payment']['client_id'] = $id;
			// var_dump($requestdata);
			$this->Payment->create();
			if ($this->Payment->save($requestdata)) {
				$this->Transaction->save($transaction);
				return $this->redirect(array('action' => 'details', $id));
			} else {
				var_dump("error saving...");
				exit();
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
				var_dump("no ID...");
				exit();
			$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function addAdvance($id, $requestdata){
		
	}
}