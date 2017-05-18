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
		'Advancement',
		'Transaction',
		'Report'
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
				'fields' => array(
					'Client.*',
					'Report.*'
				),	
				'conditions' => array(
					'Client.id' => $id
				),
				'joins' => array(
					array(
						'table' => 'reports',
						'alias' => 'Report',
						'type' => 'LEFT',
						'conditions' => array(
							'Report.client_id' => $id,
							'Report.paid_flg' => 0
						)
					)
				),
				'recursive' => -1
			)
		);
		if (!$client) {
			$this->redirect('/clients');
		}

		$this->set('transactions', $this->getClientTransactions($id));
		$principal = $this->getClientPrincipal($id);
		$client['Client']['principal'] = isset($principal['Principal']) ? $principal['Principal'] : '';
		$age = $this->getage($client['Client']['birthdate']);
		$this->set('principal', isset($principal['Principal']) ? $principal['Principal'] : '');
		$this->set('clientAge', $age);
		$this->set('client', $client['Client']);

		if ($this->request->is('post')) {
			switch ($this->request->data['submit']) {
				case 'addprincipal':
					$this->addPrincipal($client['Client'], $this->request->data);
					break;
				case 'addpayment':
					$this->addPayment($client, $this->request->data);
					break;
				case 'addadvance':
					$this->addAdvance($client, $this->request->data);
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
					$pdata = $this->request->data['Principal'];
					$borrow_date = $pdata['borrow_date']['year']."-".$pdata['borrow_date']['month']."-".$pdata['borrow_date']['day'];
					$this->request->data['Principal']['due_date'] = Date("Y-m-d", strtotime( $borrow_date."+".$pdata['months_to_pay']." Month"));
					$this->request->data['Principal']['client_id'] = $client_id;

					$interest = $this->getInterest($pdata['amount'], $pdata['months_to_pay']);
					$pbal = $pdata['amount'] + $interest;
					$balance = $this->getBalance($client['balance'], $pbal, 1); //type 1 for principal

					$transaction['Transaction'] = array(
							'client_id' => $client_id,
							'amount' => $pdata['amount'],
							'type' => 1,
							'interest' => $interest,
							'balance' => $balance
						);

					$this->Principal->create();
					if ($this->Principal->save($this->request->data)) {
						$this->Transaction->save($transaction);
						// This will update Client new balance
						$data = array('id' => $client_id, 'balance' => $balance);
						$this->Client->save($data);
						return $this->redirect(array('action' => 'details', $client_id));
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
				'order' => array('Transaction.id DESC'),
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
	public function getAdvanceInterest($amount){
		if ($amount) {
			return $interest = $amount * .05;
		} else {
			return false;
		}
	}
	public function getBalance($client_balance, $newAmount, $type){
		if ($newAmount && $type) {
			switch ($type) {
				case 1:
					return $balance = $client_balance + $newAmount;
					break;
				case 2:
					return $balance = $client_balance + $newAmount;
					break;
				case 3:
					return $balance = $client_balance - $newAmount;
					break;
			}
		} else {
			return false;
		}
	}
	public function addPrincipal($client, $requestdata){
		if (isset($client['id']) && $client['id']) {
			$id = $client['id'];
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
				$pbal = $transdata['amount'] + $interest;
				$balance = $this->getBalance($client['balance'], $pbal, 1); //type 1 for principal

				$transaction['Transaction'] = array(
						'client_id' => $id,
						'amount' => $transdata['amount'],
						'type' => 1,
						'interest' => $interest,
						'balance' => $balance
					);
				$report['Report'] = array(
						'client_id' => $id,
						'total_interest' => $interest
					);

				$pdata = $requestdata['Principal'];
				$borrow_date = $pdata['borrow_date']['year']."-".$pdata['borrow_date']['month']."-".$pdata['borrow_date']['day'];
				$requestdata['Principal']['due_date'] = Date("Y-m-d", strtotime( $borrow_date."+".$pdata['months_to_pay']." Month"));
				$requestdata['Principal']['client_id'] = $id;

				$this->Principal->create();
				if ($this->Principal->save($requestdata)) {
					$this->Transaction->save($transaction);
					$this->Report->save($report);
					// This will update Client new balance
					$data = array('id' => $id, 'balance' => $balance);
					$this->Client->save($data);
					return $this->redirect(array('action' => 'details', $id));
				} else {
					$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}


			}
		} else {
			$this->Session->setFlash(__('The principal could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function addPayment($clientdata, $requestdata){
		$client = isset($clientdata['Client']) ? $clientdata['Client'] : '';
		$report = isset($clientdata['Report']) ? $clientdata['Report'] : false;

		if (isset($client['id']) && $client['id']) {
			$id = $client['id'];
			$transdata = $requestdata['Payment'];
			$balance = $this->getBalance($client['balance'], $transdata['amount'], 3); //type 3 for payment

			$transaction['Transaction'] = array(
					'client_id' => $id,
					'amount' => $transdata['amount'],
					'type' => 3,
					'interest' => 0,
					'balance' => $balance
				);
			$report = array(
					'id' => $report['id'],
					'paid_flg' => 1,
					'date_paid'  => date('Y-m-d H:i:s')
				);
			$principal = array(
					'id' => $client['principal']['id'],
					'paid_flg' => 1
				);

			$requestdata['Payment']['client_id'] = $id;
			$this->Payment->create();
			if ($this->Payment->save($requestdata)) {
				$this->Transaction->save($transaction);
				$data = array('id' => $id, 'balance' => $balance);
				if ($balance <= 0 && isset($report['id'])) {
					$this->Principal->save($principal);
					$this->Report->save($report);
				}
				$this->Client->save($data);
				return $this->redirect(array('action' => 'details', $id));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function addAdvance($clientdata, $requestdata){
		$client = isset($clientdata['Client']) ? $clientdata['Client'] : '';
		$report = isset($clientdata['Report']) ? $clientdata['Report'] : false;

		if (isset($client['id']) && $client['id']) {
			$id = $client['id'];
			$transdata = $requestdata['Advancement'];
			$interest = $this->getAdvanceInterest($transdata['amount']);
			$balance = $this->getBalance($client['balance'], $transdata['amount'], 2); //type 2 for advancement
			$balance = $balance + $interest;
			$transaction['Transaction'] = array(
					'client_id' => $id,
					'amount' => $transdata['amount'],
					'type' => 2,
					'interest' => $interest,
					'balance' => $balance
				);
			$report = array(
					'id' => $report['id'],
					'total_interest' => $report['total_interest'] + $interest
				);

			$requestdata['Advancement']['client_id'] = $id;
			$requestdata['Advancement']['interest'] = $interest;

			$this->Advancement->create();
			if ($this->Advancement->save($requestdata)) {
				$this->Transaction->save($transaction);
				$this->Report->save($report);
				$data = array('id' => $id, 'balance' => $balance);
				$this->Client->save($data);
				return $this->redirect(array('action' => 'details', $id));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}	
	}
}