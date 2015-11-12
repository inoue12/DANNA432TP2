<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property Group $Group
 */
class Student extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'other_details' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
			
		'thumb_file' => array(
			'fileExtension' => array(
				'rule' => array('fileExtension', array('jpg','png','gif')),
				'message' => 'The extension of the file should be jpg, png or gif'
			),
			'image' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'Image must be less than 1MB'
			)
		),
	);

	public $actsAs = array(
		'Upload.Upload' => array(
			'fields' => array(
				'thumb' => 'img/subjects/:id'
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'students_groups',
			'foreignKey' => 'student_id',
			'associationForeignKey' => 'group_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}

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
