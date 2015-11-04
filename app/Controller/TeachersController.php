<?php
App::uses('AppController', 'Controller');
/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
 * @property PaginatorComponent $Paginator
 */
class TeachersController extends AppController {

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
	public function index() {
		$this->Teacher->recursive = 1;
		$this->set('teachers', $this->paginate());
	}

	public function isAuthorized($user) {
		if (isset($user['role']) && ($user['role'] === 'teacher')){
				if (in_array($this->action, array('add'))) {
					return true;
				}
		}		
		
		if(isset($user['role']) && ($user['role'] === 'teacher')){
		
		} else if(isset($user['role']) && ($user['role'] === 'admin')){
		
		} else {
			$this->Session->setFlash(__('You don\'t have the right to access to teachers.'), 'flash/error');
		}
		
    // The owner of a post can edit and delete it
 if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Teacher->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
		$this->set('teacher', $this->Teacher->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Teacher->create();
			$this->request->data['Teacher']['user_id'] = $this->Auth->user('id');
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$groups = $this->Teacher->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Teacher->id = $id;
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
			$this->request->data = $this->Teacher->find('first', $options);
		}
		$groups = $this->Teacher->Group->find('list');
		$this->set(compact('groups'));
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
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('Teacher deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Teacher was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
