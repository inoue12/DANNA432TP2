<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 */
class SubjectsController extends AppController {

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
        $this->Auth->allow('getByProgram', 'index');
    }
	public function index() {
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->paginate());
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

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Subject->isOwnedBy($postId, $user['id'])) {
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
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subject->create();
			$this->request->data['Student']['user_id'] = $this->Auth->user('id');
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$programs = $this->Subject->Program->find('list');
		$this->set(compact('programs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Subject->id = $id;
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
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
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('Subject deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subject was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
		
		
	public function getByProgram() {
		$program_id = $this->request->data['Group']['program_id'];
 
		$subjects = $this->Subject->find('list', array(
		'conditions' => array('Subject.program_id' => $program_id),
		'recursive' => -1
	));
 
	$this->set('subjects',$subjects);
	$this->layout = 'ajax';
	}
	

}
