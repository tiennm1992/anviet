<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'Facebook', array('file' => 'Facebook' . DS . 'Facebook.php'));
require_once APP . 'Vendor' . DS . 'Facebook' . DS . 'facebook.php';
require_once APP . 'Vendor' . DS . 'Facebook' . DS . 'autoload.php';

class ClientController extends AppController {

    public $users = array('User', 'Post');
    public $components = array('Paginator');

    public function beforeFilter() {
        $this->Auth->allow();
        $this->loadModel('User');
        $this->loadModel('Post');
        session_start();
    }

    public function login_facebook() {
        phpinfo();
    }

    public function index() {
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

    public function detail($id = 0) {
        if (!$this->Post->exists($id)) {
            $this->redirect('/client');
        }
        $data = $this->Post->find('first', array(
            'conditions' => array(
                'Post.id' => $id
            )
        ));
        $this->set('post', $data['Post']);
        $this->set('post_id', $id);
    }

    public function my_post() {
        
    }

    public function upload() {
        
    }

    //type : 1 is image , 2 is video
    public function add_post() {
        $this->check_login();
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
            $data_upload = $data['Post'];
            if (empty($data_upload['title']) || empty($data_upload['content'])) {
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

    public function edit($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->request->data;
            $data_upload = $data['Product'];
            //upload avatar
            $img_arr2 = '';
            $avatar = $data['Product']['avatar'];
            if (!empty($avatar) && isset($avatar)) {
                $target_path = "uploads/"; //Declaring Path for uploaded images
                $validextensions = array("jpeg", "jpg", "png", "PNG");  //Extensions which are allowed
                $ext = explode('.', basename($avatar['name'])); //explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable

                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1]; //set the target path with a new name of image

                if (($avatar['size'] < 100000000) //Approx. 100kb files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                    if (move_uploaded_file($avatar['tmp_name'], $target_path)) {//if file moved to uploads folder
                        $img_arr2 = $target_path;
                    } else {//if file was not moved.
                        echo ').<span id="error">please try again!.</span><br/><br/>';
                        die;
                    }
                }
                if (!empty($img_arr2)) {
                    $data_upload['avatar'] = $img_arr2;
                } else {
                    $data_upload['avatar'] = $data_upload['avatar_tmp'];
                }
            }
            unset($data_upload['avatar_tmp']);
            $this->Product->create();
            if ($this->Product->save($data_upload)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect($this->Session->read('back'));
//                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
        $categories = $this->Product->Category->find('list', array('conditions' => array('Category.app_code' => $app_code)));
        $subcategories = $this->Product->Subcategory->find('list');
        $this->set(compact('categories', 'subcategories'));
    }

    public function log1() {
        if (!session_id()) {
            session_start();
        }
        $this->autoRender = FALSE;
        $fb = new Facebook\Facebook([
            'app_id' => APP_ID, // Replace {app-id} with your app id
            'app_secret' => SECRET,
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl("http://demo.aphimdayroi.com/client/log2", $permissions);
//        $loginUrl = $helper->getLoginUrl('http://localhost/pokemon/client/log2', $permissions);
        $this->redirect($loginUrl);
//        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    public function log2() {
        if (!session_id()) {
            session_start();
        }
        $this->autoRender = FALSE;
        $fb = new Facebook\Facebook([
            'app_id' => APP_ID, // Replace {app-id} with your app id
            'app_secret' => SECRET,
            'default_graph_version' => 'v2.2'
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $_SESSION['FBRLH_state'] = $_GET['state'];

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
// Logged in
//        echo '<h3>Access Token</h3>';
//        var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//        echo '<h3>Metadata</h3>';
//        var_dump($tokenMetadata);
// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId(APP_ID); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }
//            echo '<h3>Long-lived</h3>';
//            $user_data = $accessToken->getValue();
//            var_dump();
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;
        $response = $fb->get('/me?fields=id,name,email,birthday,bio,cover,currency,education,first_name,last_name,gender', $_SESSION['fb_access_token']);
        $user = $response->getGraphUser();
        $profile_data = array(
            'face_id' => (!empty($user->getField('id'))) ? $user->getField('id') : 0,
            'username' => (!empty($user->getField('last_name'))) ? 'client_' . $user->getField('last_name') : '',
            'email' => (!empty($user->getField('email'))) ? $user->getField('email') : '',
            'phone' => (!empty($user->getField('phone'))) ? $user->getField('phone') : 0,
            'avatar' => 'https://graph.facebook.com/' . $user->getField('id') . '/picture?type=large',
            'birth' => (!empty($user->getField('birthday'))) ? $user->getField('birthday') : '',
            'address' => '',
            'full_name' => (!empty($user->getField('name'))) ? $user->getField('name') : '',
            'first_name' => (!empty($user->getField('first_name'))) ? $user->getField('first_name') : '',
            'last_name' => (!empty($user->getField('last_name'))) ? $user->getField('last_name') : '',
            'gender' => (!empty($user->getField('gender'))) ? $user->getField('gender') : '',
        );

        $data = $this->User->get_user_face($profile_data['face_id']);
        if (!empty($data)) {
            $profile_data['id'] = $data['User']['id'];
        }
        if ($this->User->save($profile_data)) {
            $user_data = $this->User->find('first', array('conditions' => array('User.face_id' => $profile_data['face_id'])));
            $_SESSION['user_id'] = $user_data['User']['id'];
            $this->redirect('/client/index');
        };
    }

    public function login() {
        
    }

    public function check_login() {
        if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
            $this->redirect('/client/login');
        }
    }

}
