<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            )
        ),
        'confirm_password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Confirm password'
            )
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A name is required'
            )
        ),
        'email' => array(
            'email' => array (
                'rule'    => array('email', true),
                'message' => 'Please supply a valid email address.'
            ),
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A email is required'
            )
        ),
        'birthdate' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A birthdate is required'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
?>
