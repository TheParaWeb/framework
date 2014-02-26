<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:11 PM
 */

class Help extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Help';

        $this->view->render('header');
        $this->view->render('help/index');
        $this->view->render('footer');
    }


}