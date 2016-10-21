<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Customer extends AppModel {

    public $useTable = 'customers';

    public function check_exist_user($username) {
        $check_user = $this->find('all', array(
            'conditions' => array(
                'username' => $username
            )
        ));
        if ($check_user) {
            return 1;
        }
        return 0;
    }

}
