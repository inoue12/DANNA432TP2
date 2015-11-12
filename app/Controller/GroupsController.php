<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Js');
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}
	public function isAuthorized($user) {
		if (isset($user['role']) && ($user['role'] === 'teacher')){
				if (in_array($this->action, array('add'))) {
					return true;
				}
		}		
	/**}else {
			$this->Session->setFlash(__('You don\'t have the right to add a teacher.'), 'flash/error');
				$this->redirect(array('action' => 'index'));**/
				//return false;
		if(isset($user['role']) && ($user['role'] === 'teacher')){
		
		} else if(isset($user['role']) && ($user['role'] === 'admin')){
		
		} else {
			$this->Session->setFlash(__('You don\'t have the right to access to groups.'), 'flash/error');
		}
    // The owner of a post can edit and delete it
 if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Group->isOwnedBy($postId, $user['id'])) {
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
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			$this->request->data['Group']['user_id'] = $this->Auth->user('id');
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$programs = $this->Group->Subject->Program->find('list');
		
		$subjects = $this->Group->Subject->find('list', array('conditions' => array('program_id' => 1)));
		$students = $this->Group->Student->find('list');
		$teachers = $this->Group->Teacher->find('list');
		$this->set(compact('programs','subjects', 'students', 'teachers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Group->id = $id;
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
		
		$programs = $this->Group->Subject->Program->find('list');
		$this->request->data['Group']['program_id'] = $this->request->data['Subject']['program_id'];
		 if (isset($this->request->data['Subject']['program_id'])) {
            $subjects = $this->Group->Subject->find('list', array('conditions' => array('program_id' => $this->request->data['Subject']['program_id'])));
        } else {
            $subjects = $this->Group->Subject->find('list', array('conditions' => array('program_id' => 1)));
        }
		$students = $this->Group->Student->find('list');
		$teachers = $this->Group->Teacher->find('list');
		$this->set(compact('programs','subjects', 'students', 'teachers'));
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
}
