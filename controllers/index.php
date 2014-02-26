<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:07 PM
 */

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::sessionStart('SESSION_NAME'); //TODO: Change session name to relevant name.
    }

    function index()
    {
        $this->statistics->insertPageView();
        $location = Auth::getLocation($_SERVER['REMOTE_ADDR']);
        $this->forecast = new ForecastIO('58a0e9e0efd5d2b69387806157975afe');
        $this->view->weatherConditions = $this->forecast->get($location['latitude'],$location['longitude']);
        $this->view->title = 'TEST';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}