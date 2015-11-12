<?php
App::uses('AppModel', 'Model');
/**
 * Detail Model
 *
 */
class Detail extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'name';
	
	public function getDetailNames ($term = null) {
      if(!empty($term)) {
        $details = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $details;
      }
      return false;
    }

}
