<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController {

	public $uses = array();	
	public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

	public function login() {
		$this->set('error_login', "");
		$this->layout = 'content_only';
		$isloggedin = AuthComponent::user('id');
		if(isset($isloggedin) && $isloggedin){
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'index')));
		}

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
					$user = $this->Session->read("Auth.User");
					$this->User->id = $user['id'];
					$this->User->saveField('last_login_time', date('Y-m-d H:i:s'));
                return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'index')));
            }
            $this->set('error_login', "Invalid username or password, try again!");
        }
	}

	public function index() {
		$this->layout = 'admin';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
		$this->set('headtitle', 'Dashboard');
	}

	public function profile($id = null) {
		$this->set('headtitle', 'User Profile');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$information = $this->User->find('first', $options);
		$this->set('user', $information);
		$this->set('yourage', $this->getAge($information['User']["birthdate"]));
	}

	public function add() {
		$this->layout = 'content_only';
		if ($this->request->is('post')) {
			$this->request->data['User']['created_ip'] = $this->request->clientIp();
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				return $this->redirect(array('controller' => 'pages', 'action' => 'success'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['User']['modified_ip'] = $this->request->clientIp();
			$this->request->data['User']['modified'] = date('Y-m-d H:i:s');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

    public function logout() {
        //return $this->redirect($this->Auth->logout());
        return $this->redirect($this->Auth->logout($this->Auth->redirect(array('controller' => 'users', 'action' => 'login'))));
    }
    public function getAge($birthdayDate){
		 $date = new DateTime($birthdayDate);
		 $now = new DateTime();
		 $interval = $now->diff($date);
		 return $interval->y;
	}
}
