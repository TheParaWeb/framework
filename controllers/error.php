<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:07 PM
 */

class Error extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($data = null)
    {
        $this->view->title = 'Help';
        $this->view->msg = '<h3>' . 'Error: Page does not exist' . '</h3>';

        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}