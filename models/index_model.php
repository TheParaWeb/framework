<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/23/14
 * Time: 3:56 PM
 */

class Index_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('SESSION_NAME'); //TODO: Change session name.
        $this->visitorId = Session::get('visitorId');
    }

    public function getWeather($location){
        $this->forecast = new ForecastIO('58a0e9e0efd5d2b69387806157975afe');
        $this->conditions = $this->forecast->get($location['latitude'],$location['longitude']);
        return $this->conditions;
    }

    public function test(){
        return "uyu";
    }
}