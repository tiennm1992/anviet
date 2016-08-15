<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array("Session", "Html", "Form",'Grid',);
    public $user = array('Users');
    public $components = array(
        'Session', 'Cookie', 'RequestHandler',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'admin',
                'action' => 'index'
            ),
            'authError' => 'You must be logged in to view this page!!!',
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User',
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'md5'
                    ),
                )
            )
        )
    );

    public function beforeRender() {
        $this->layout = 'frontend';
        if (strpos($this->request->controller, 'users') !== false && $this->action == 'login') {
            $this->layout = 'sakama';
        }
        if (strpos($this->request->controller, 'admin') !== false) {
            $this->layout = 'admin';
        }
    }

    public function beforeFilter() {
//        $this->Auth->allow('index', 'view');
    }

}
