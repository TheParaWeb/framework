<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/22/14
 * Time: 9:27 PM
 */

class Tests extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        Session::sessionStart('MTC_STUDENT');
        Session::handleCookie();
    }

    function index()
    {
        header('Location: '.URL.'error/');
    }

    function resetCookie(){
        if(isset($_COOKIE['visitorId'])){
            setcookie('visitorId', $_COOKIE['visitorId'], time()-3600);
        }
        Session::kill('visitorId');
        Session::destroy();
        header('Location: '.URL);
    }

    function generateSalary(){
        $this->model->generateSalary();
    }

}