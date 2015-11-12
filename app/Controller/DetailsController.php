<?php
App::uses('AppController', 'Controller');
/**
 * Details Controller
 *
 * @property Detail $Detail
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
class DetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */	
	//public $layout = 'basic';
	public $components = array('RequestHandler');

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

    public function add() {
      if ($this->request->is('ajax')) {
        $term = $this->request->query('term');
        $detailNames = $this->Detail->getDetailNames($term);
        $this->set(compact('detailNames'));
        $this->set('_serialize', 'detailNames');
      }
    }
	
	public function edit() {
      if ($this->request->is('ajax')) {
        $term = $this->request->query('term');
        $detailNames = $this->Detail->getDetailNames($term);
        $this->set(compact('detailNames'));
        $this->set('_serialize', 'detailNames');
      }
    }

}
