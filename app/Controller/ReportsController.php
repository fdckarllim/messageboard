<?php 

App::uses('AppController', 'Controller');

/**
* 
*/
class ReportsController extends AppController
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
		$reports = $this->Report->find('all');
		$clients = $this->Client->find('all', array(
			'fields' => array(
					'Client.id',
					'Client.fname',
					'Client.mname',
					'Client.lname'
				)
			)
		);
		foreach ($clients as $client) {
			$det = $client['Client'];
			$clientList[$det['id']] = array(
				'fname' => $det['fname'],
				'mname' => $det['mname'],
				'lname' => $det['lname']
			);
		}
		foreach ($reports as $report) {
			$det = $report['Report'];
			$reportList[] = array(
				'id' => $det['id'],
				'name' => $clientList[$det['client_id']],
				'total_interest' => $det['total_interest'],
				'date_paid' => $det['date_paid']
			);
		}
		if (isset($reportList) && $reportList) {
			$this->set('reports', $reportList);
		}
		
	}	
}