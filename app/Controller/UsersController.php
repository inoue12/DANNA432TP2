<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('login','logout','register', 'activate', 'sendmail');
		$this->Auth->deny('view', 'add', 'delete', 'edit', 'index');
	}

	public function login() {
		if ($this->request->is('post')) {
			$user = $this->User->find('first', array(
                'conditions' => array('User.username' => $this->request->data['User']['username']) ));
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	/**public function register() {
		if ($this->request->is('post')) {
			if ($this->data['User']['password'] == $this->data['User']['password_confirm']) {
				$this->request->data['User']['role'] = 'guest';
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					 App::uses('CakeEmail', 'Network/Email');
                $user = $this->User->read(null, $this->User->id);
                $link = array('controller' => 'users', 'action' => 'activate',
                        $this->User->id . '-' . md5($user['User']['password']));
                $mail = new CakeEmail('gmail');
                $mail->from("test.cour.php@gmail.com");
                $mail->to($this->request->data['User']['email']);
                $mail->subject(__('Please confirm your email !'));
                $mail->emailFormat('html');
                $mail->template('signup');
                $mail->viewVars(array(
                    'username' => $this->request->data['User']['username'],
                    'link' => $link
                ));
                $mail->send();
				 $this->redirect(array('action' => 'login'));
				}
			} else {
				  $this->Flash->error(__('The passwords do not match.'));
			}
		}
	}**/
	
		public function register() {
		if ($this->request->is('post')) {
			if ($this->data['User']['password'] == $this->data['User']['password_confirm']) {
				$this->request->data['User']['role'] = 'student';
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					 App::uses('CakeEmail', 'Network/Email');
                $user = $this->User->read(null, $this->User->id);
                $link = array('controller' => 'users', 'action' => 'activate',
                        $this->User->id . '-' . md5($user['User']['password']));
                $mail = new CakeEmail('gmail');
                $mail->from("test.cour.php@gmail.com");
                $mail->to($this->request->data['User']['email']);
                $mail->subject(__('Please confirm your email !'));
                $mail->emailFormat('html');
                $mail->template('signup');
                $mail->viewVars(array(
                    'username' => $this->request->data['User']['username'],
                    'link' => $link
                ));
                $mail->send();
				 $this->redirect(array('action' => 'login'));
				}
			} else {
				  $this->Flash->error(__('The passwords do not match.'));
			}
		}
	}
	
	
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
	public function isAuthorized($user) {
		if ($this->action == 'view' && isset($user['id']) && $this->request->params['pass'][0] === $user['id']) {
            return true;
        }
		
		if(isset($user['role']) && ($user['role'] === 'student')){
			} else if(isset($user['role']) && ($user['role'] === 'admin')){
			} else {
				$this->Session->setFlash(__('You don\'t have the right to access the users.'), 'flash/error');
			}
		return parent::isAuthorized($user);
	}
	
public function sendmail($recipient = null, $username = null, $id = null, $redirect = true) {
				App::uses('CakeEmail', 'Network/Email');
                $user = $this->User->read(null, $this->User->id);
                $link = array('controller' => 'users', 'action' => 'activate',
                        $this->User->id . '-' . md5($user['User']['password']));
                $mail = new CakeEmail('gmail');
				$mail->from('test.cour.php@gmail.com')->to($recipient)->subject('Mail Confirm');
                 $mail->emailFormat('html')->template('signup')->viewVars(array('username' => $username, 'link' => $link));
                $mail->send();
				if ($redirect) {
            $this->redirect('/');
        }
				}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				 $this->Flash->success(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				  $this->Flash->error(
                            __('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	/**public function activate($token) {
        if (empty($token)) {
            $this->redirect(array('action' => 'login'));
        }
        $token = explode('-', $token);
        $user = $this->User->find('first', array(
            'conditions' => array('id' => $token[0], 'MD5(User.password)' => $token[1], 'active' => false)
        ));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
			$this->request->data['User']['role'] = 'student';
            $this->Session->setFlash(__('Your account as been activated'), 'flash/success');
        } else {
            $this->Session->setFlash(__('The activation link is not valid or this user is already activated'), 'flash/success');
        }
		if ($this->Session->check('Auth.User')) {
		$this->redirect($this->Auth->logout());
		 $this->redirect(array('action' => 'login'));
		 }else{
        $this->redirect(array('action' => 'login'));
		}
    }**/
	
		public function activate($token) {
        if (empty($token)) {
            $this->redirect(array('action' => 'login'));
        }
        $token = explode('-', $token);
        $user = $this->User->find('first', array(
            'conditions' => array('id' => $token[0], 'MD5(User.password)' => $token[1], 'active' => false)
        ));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
			$this->request->data['User']['role'] = 'student';
            $this->Session->setFlash(__('Your account as been activated'), 'flash/success');
        } else {
            $this->Session->setFlash(__('The activation link is not valid or this user is already activated'), 'flash/success');
        }
        if ($this->Session->check('Auth.User')) {
		$this->redirect($this->Auth->logout());
		 $this->redirect(array('action' => 'login'));
		 }else{
        $this->redirect(array('action' => 'login'));
		}
    }
	
		/**public function activate($token) {
        if (empty($token)) {
            $this->redirect(array('action' => 'login'));
        }
        $token = explode('-', $token);
        $user = $this->User->find('first', array(
            'conditions' => array('id' => $token[0], 'MD5(User.password)' => $token[1], 'active' => false)
        ));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash(__('Your account as been activated'), 'flash/success');
        } else {
            $this->Session->setFlash(__('The activation link is not valid or this user is already activated'), 'flash/success');
        }
        $this->redirect(array('action' => 'login'));
    }**/
}
