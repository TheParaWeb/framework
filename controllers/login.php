<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/5/13
 * Time: 2:46 PM
 */

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->schools = new Schools();
    }

    function index()
    {
        $this->statistics->insertPageView('login/login/');
        $this->view->msg = Session::get('msg');
        Session::kill('msg');

        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Login';
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    function signup()
    {
        $this->statistics->insertPageView('login/signup/');
        $this->view->msg = Session::get('msg');
        Session::kill('msg');

        $this->view->title = 'Midlands Technical College LifeStyle Quiz | Sign Up';
        $this->view->schoolCategories = $this->schools->getSchoolCategories();
        $this->view->schools = $this->schools->getSchools();
        $this->view->render('header');
        $this->view->render('login/signup');
        $this->view->render('footer');
    }

    function createUser()
    {
        $this->model->createUser();
    }

    function login()
    {
        $this->model->login();
    }

    function logout()
    {
        $this->model->logout();
    }

}