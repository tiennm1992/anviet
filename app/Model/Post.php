<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 * @property UserPost $UserPost
 * @property Comment $Comment
 * @property Category $Category
 */
class Post extends AppModel {

    public $useTable = 'users';

    public function get_post($param) {
        
    }

}
