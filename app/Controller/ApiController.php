<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ApiController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow();
        $this->check_login();
    }

    public function register() {
        $params=  $this->request->data;
        
        
    }

    public function login() {
        
    }

    public function get_profile() {
        
    }

    public function get_user_post_list() {
        
    }

    public function get_image_list() {
        
    }

    public function get_device_info() {
        
    }

    public function create_post() {
        
    }

    public function get_list_post() {
        
    }

    public function get_service_list() {
        
    }

    public function upload_image() {
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
            $data_upload = $data['Post'];
            if (empty($data_upload['image'])) {
                $this->Flash->set('Thieu thong tin dien file', array(
                    'element' => 'success'
                ));
            }
            $content = $data['Post']['content'];
            $target_path = "uploads/"; //Declaring Path for uploaded images
            $allow_image = array("jpeg", "jpg", "png", "PNG");  //Extensions which are allowed
            $allow_video = array("webm", "mp4", "ogv", "flv");
            if (!empty($content) && isset($content)) {
                $ext = explode('.', basename($content['name'])); //explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable
                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1]; //set the target path with a new name of image
                if (in_array($file_extension, $allow_image)) {
                    if (move_uploaded_file($content['tmp_name'], $target_path)) {//if file moved to uploads folder
                        $data_upload['image'] = $target_path;
                        $data_upload['type'] = 1;
                    }
                } elseif (in_array($file_extension, $allow_video)) {
                    if (move_uploaded_file($content['tmp_name'], $target_path)) {//if file moved to uploads folder
                        $data_upload['video'] = $target_path;
                        $data_upload['type'] = 2;
                    }
                }
                unset($data_upload['content']);
            }
            $data_upload['user_post_id'] = $_SESSION['user_id'];
            if ($this->Post->save($data_upload)) {
                $this->Session->setFlash('Your stuff has been saved.');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Your stuff has been saved.');
            die;
        }
    }

    public function response($data, $error, $mess) {
        $rep_data = array(
            'error' => $error,
            'mess' => $mess,
            'data' => $data
        );
        echo json_encode($rep_data, true);
        die;
    }

    public function check_login() {
        
    }

}
