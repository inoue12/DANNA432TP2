<?php
App::uses('AppController', 'Controller');
/**
 * Programs Controller
 *
 * @property Program $Program
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ProgramsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Program->recursive = 0;
		$this->set('programs', $this->paginate());
	}
	
	public function isAuthorized($user) {
    if (isset($user['role']) && ($user['role'] === 'admin')){
			if (in_array($this->action, array('add'))) {
				return true;
			}
			if(isset($user['role']) && ($user['role'] === 'admin')){
			} else {
				$this->Session->setFlash(__('You don\'t have the right to add a subject.'), 'flash/error');
			}
		}else {
			$this->Session->setFlash(__('You don\'t have the right to add a subject.'), 'flash/error');
				$this->redirect(array('action' => 'index'));
				return false;
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
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Invalid program'));
		}
		$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
		$this->set('program', $this->Program->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'), 'flash/error');
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
        $this->Program->id = $id;
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('The program has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
			$this->request->data = $this->Program->find('first', $options);
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
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Invalid program'));
		}
		if ($this->Program->delete()) {
			$this->Session->setFlash(__('Program deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Program was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
