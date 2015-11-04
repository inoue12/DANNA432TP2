<?php
App::uses('AppController', 'Controller');
/**
 * StudentsGroups Controller
 *
 * @property StudentsGroup $StudentsGroup
 * @property PaginatorComponent $Paginator
 */
class StudentsGroupsController extends AppController {

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
		$this->StudentsGroup->recursive = 0;
		$this->set('studentsGroups', $this->paginate());
	}
public function isAuthorized($user) {
    if (isset($user['role']) && ($user['role'] === 'admin')){
			if (in_array($this->action, array('add'))) {
				return true;
			} 
	}
	 if(isset($user['role']) && ($user['role'] === 'admin')){
			} else {
				$this->Session->setFlash(__('You don\'t have the right to access to StudentsGroups.'), 'flash/error');
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
		if (!$this->StudentsGroup->exists($id)) {
			throw new NotFoundException(__('Invalid students group'));
		}
		$options = array('conditions' => array('StudentsGroup.' . $this->StudentsGroup->primaryKey => $id));
		$this->set('studentsGroup', $this->StudentsGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentsGroup->create();
			if ($this->StudentsGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The students group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The students group could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$students = $this->StudentsGroup->Student->find('list');
		$groups = $this->StudentsGroup->Group->find('list');
		$this->set(compact('students', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->StudentsGroup->id = $id;
		if (!$this->StudentsGroup->exists($id)) {
			throw new NotFoundException(__('Invalid students group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StudentsGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The students group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The students group could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('StudentsGroup.' . $this->StudentsGroup->primaryKey => $id));
			$this->request->data = $this->StudentsGroup->find('first', $options);
		}
		$students = $this->StudentsGroup->Student->find('list');
		$groups = $this->StudentsGroup->Group->find('list');
		$this->set(compact('students', 'groups'));
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
		$this->StudentsGroup->id = $id;
		if (!$this->StudentsGroup->exists()) {
			throw new NotFoundException(__('Invalid students group'));
		}
		if ($this->StudentsGroup->delete()) {
			$this->Session->setFlash(__('Students group deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Students group was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
