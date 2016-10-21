<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

    public $components = array('Paginator');
    public $uses = array('Post', 'User');
    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
        return parent::isAuthorized($user);
    }

    public function index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->Paginator->paginate());
    }

    public function user($param) {
        
    }

    public function post_list() {
        $this->Post->recursive = 0;
        $this->Paginator->settings = array(
            'fields' => array('Post.*', 'User.*'),
            'limit' => 25,
            'order' => array(
                'Post.title' => 'asc'
            ),
            'joins' => array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'User.id = Post.user_post_id'
                    )
                )
            )
        );
        $data = $this->Paginator->paginate('Post');
        $this->set('posts', $data);
    }

    public function user_list() {
        
    }

    public function edit($id = null) {
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('The post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
            $this->request->data = $this->Post->find('first', $options);
        }
        $userPosts = $this->Post->UserPost->find('list');
        $comments = $this->Post->Comment->find('list');
        $categories = $this->Post->Category->find('list');
        $this->set(compact('userPosts', 'comments', 'categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Post->delete()) {
            $this->Session->setFlash(__('The post has been deleted.'));
        } else {
            $this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
