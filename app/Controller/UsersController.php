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
		$this->layout = 'home';
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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function profile($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		$this->layout = 'home';
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
}
