<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/5/13
 * Time: 4:38 PM
 */

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->visitorId = Session::get('visitorId');
        $this->lifestyle= new Lifestyle();
    }

    public function login()
    {
        $postData = array(
            ':email' => $_POST['email']
        );
        $result = $this->db->select("SELECT * FROM students WHERE email = :email LIMIT 1", $postData);
        $result = $result[0];

        if (count($result) > 0) {
            Session::set('loggedIn', true);
            Session::set('email', $postData['email']);
            Session::set('visitorId',$result['visitorId']);
            header('location: ' . URL . 'dashboard/index');
        } else {
            Session::set('msg', array('error' => 'Hmm... this email is not in our system.'));
            header('location: ' . URL . 'login');
        }
    }

    public function logout()
    {
        Session::destroy();
        header('location: ' . URL);
    }

    public function createUser()
    {
        Session::handleCookie();
        $postData = array(
            'name' => $_POST['name'],
            'email' => strtolower($_POST['email']),
            'gender' => $_POST['gender'],
            'age' => $_POST['age'],
            'school' => $_POST['school'],
            'visitorId' => $this->visitorId
        );

        $result = $this->db->select("SELECT * FROM students WHERE email = :email", array(':email' => $postData['email']));
        if (count($result) > 0) {
            Session::set('msg', array('error' => 'Oops...this email is already in our system!'));
            header('location: ' . URL . 'login/signup');
        }
        else {
            if ($this->db->insert('students', $postData)) {
                Session::set('loggedIn', true);
                Session::set('email', $postData['email']);
                Session::set('visitorId',$_COOKIE['visitorId']);

                header('location: ' . URL . 'lifestyle');
            } else {
                Session::set('msg', array('error' => 'Oops...there was an error in our system!'));
                header('location: ' . URL . 'error/index');
            }
        }
    }
}