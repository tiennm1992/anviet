<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Face $Face
 */
class User extends AppModel {

    public $useTable = 'users';

//    public $validate = array(
//        'username' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'password' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'face_id' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'email' => array(
//            'email' => array(
//                'rule' => array('email'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'phone' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'birth' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'avatar' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'address' => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'status' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'created_datetime' => array(
//            'datetime' => array(
//                'rule' => array('datetime'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'last_login' => array(
//            'datetime' => array(
//                'rule' => array('datetime'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'level' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//    );

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'md5'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function encryptPassword($password) {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'md5'));
        return $passwordHasher->hash($password);
    }

    public function check_user_exists($face_id) {
        $data = $this->find('first', array(
            'conditions' => array(
                'User.face_id' => $face_id
            )
        ));
        if ($data) {
            return TRUE;
        }
        return FALSE;
    }

    public function get_user_face($face_id) {
        $data = $this->find('first', array(
            'conditions' => array(
                'User.face_id' => $face_id
            )
        ));
        return $data;
    }

}
