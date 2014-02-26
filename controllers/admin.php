<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/5/13
 * Time: 11:48 AM
 */

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_ADMIN');
    }

    // Page generation.
    function index()
    {
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/js.js'
        );
        $this->view->js = array('admin/js/admin.js');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Admin';
        $this->view->render('admin/header');
        $this->view->render('admin/index');
        $this->view->render('footer');
    }

    function login()
    {
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->render('admin/header');
        $this->view->render('admin/login');
        $this->view->render('footer');
    }

    function profile($msg = null)
    {
        Auth::handleLogin(true);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->admin = $this->model->getAdmin(Session::get('userid'));
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | My Profile';
        $this->view->render('admin/header');
        $this->view->render('admin/profile');
        $this->view->render('footer');
    }

    function administrators()
    {
        Auth::handleLogin(true);
        $this->view->js = array(
            'admin/js/administrators.js'
        );
        $this->view->msg1 = Session::get('msg');
        Session::kill('msg1');
        $this->view->msg2 = Session::get('msg');
        Session::kill('msg2');
        $this->view->users = $this->model->getAllAdmins();
        $this->view->role = Session::get('role');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Add Administrator';
        $this->view->render('admin/header');
        $this->view->render('admin/administrators');
        $this->view->render('footer');
    }

    function editAdmin($userId)
    {
        Auth::handleLogin(true);
        $this->view->title="Midlands Technical College | Admin | Add Student";
        $this->view->admin = $this->model->getAdmin($userId);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->render('admin/header');
        $this->view->render('admin/editAdmin');
        $this->view->render('footer');
    }

    function updateRequired()
    {
        Auth::handleLogin(true);
        $this->view->secQuestions = $this->model->getSecQuestions();
        $this->view->admin = $this->model->getAdmin(Session::get('userid'));
        $this->view->msg = Session::get('msg');
        Session::kill('msg');
        $this->view->title = 'Midlands Technical College LifeStyle Quiz | My Profile';
        $this->view->render('admin/header');
        $this->view->render('admin/updateRequired');
        $this->view->render('footer');
    }


    // Functions
    function adminLogin()
    {
        $this->model->adminLogin();
    }

    function logout()
    {
        $this->model->logout();
    }

    function createAdmin()
    {
        $message = $this->model->createAdmin();
        Session::set('msg', $message);
        header('location: ' . URL . 'admin/addAdmin');
    }

    function updateAdministrator($userId){
        $this->model->updateAdministrator($userId);
        header('Location: '.URL.'admin/administrators/');
    }

    function deleteAdmin($userId){
        $this->model->deleteAdmin($userId);
        header('Location: '.URL.'admin/administrators/');
    }

    function createStudent()
    {
        $this->model->createStudent();
        header('location: ' . URL . 'admin/addStudent');
    }

    // TODO: Remove Logic Code from controller.
    function updateProfile($id, $returnPage = 'profile')
    {
        Auth::handleLogin(true);
        if ($_POST['password1'] != $_POST['password2']) {
            $admin = $this->model->getAdmin(Session::get('userid'));
            $password = $this->model->nsEncrypt->decrypt($admin[0]['password']);
            if ($_POST['password1'] != $password || strlen($_POST['password2']) != 0) {
                Session::set('msg', array('error' => 'Oops! Your passwords do not match!'));
                header('location: ' . URL . 'admin/profile');
            }
        }
        $data = array();
        $data['userid'] = Session::get('userid');
        $data['login'] = $_POST['email'];
        $data['password'] = $_POST['password1'];
        $data['question'] = $_POST['question'];
        $data['answer'] = $_POST['answer'];
        if ($this->model->updateProfile($data)) {
            Session::set('msg', array('success' => 'Successfully updated your profile!'));
            header('location: ' . URL . 'admin/' . $returnPage);
        } else {
            header('location: ' . URL . 'error/index');
        }
    }

    // AJAX
    function xhrGetPageStats(){
        $this->model->getPageStats();
    }
}