<?php
App::uses('AppController', 'Controller');
/**
 * TeachersGroups Controller
 *
 * @property TeachersGroup $TeachersGroup
 * @property PaginatorComponent $Paginator
 */
class TeachersGroupsController extends AppController {

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
		$this->Auth->deny('view', 'add', 'delete', 'edit', 'index');
	}
	public function index() {
		$this->TeachersGroup->recursive = 0;
		$this->set('teachersGroups', $this->paginate());
	}

		public function isAuthorized($user) {
    if (isset($user['role']) && ($user['role'] === 'admin')){
			if (in_array($this->action, array('add'))) {
				return true;
			}
	}			
	 if(isset($user['role']) && ($user['role'] === 'admin')){
			} else {
				$this->Session->setFlash(__('You don\'t have the right to access to TeacherGroups.'), 'flash/error');
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
		if (!$this->TeachersGroup->exists($id)) {
			throw new NotFoundException(__('Invalid teachers group'));
		}
		$options = array('conditions' => array('TeachersGroup.' . $this->TeachersGroup->primaryKey => $id));
		$this->set('teachersGroup', $this->TeachersGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeachersGroup->create();
			if ($this->TeachersGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The teachers group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teachers group could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$teachers = $this->TeachersGroup->Teacher->find('list');
		$groups = $this->TeachersGroup->Group->find('list');
		$this->set(compact('teachers', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->TeachersGroup->id = $id;
		if (!$this->TeachersGroup->exists($id)) {
			throw new NotFoundException(__('Invalid teachers group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TeachersGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The teachers group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teachers group could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('TeachersGroup.' . $this->TeachersGroup->primaryKey => $id));
			$this->request->data = $this->TeachersGroup->find('first', $options);
		}
		$teachers = $this->TeachersGroup->Teacher->find('list');
		$groups = $this->TeachersGroup->Group->find('list');
		$this->set(compact('teachers', 'groups'));
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
		$this->TeachersGroup->id = $id;
		if (!$this->TeachersGroup->exists()) {
			throw new NotFoundException(__('Invalid teachers group'));
		}
		if ($this->TeachersGroup->delete()) {
			$this->Session->setFlash(__('Teachers group deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Teachers group was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
