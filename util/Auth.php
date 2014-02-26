<?php
class Auth
{
    public static function handleLogin($admin = false)
    {
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            Session::destroy();
            if ($admin) {
                header('location: ../admin/login');
            } else {
                //$visitorId = Session::get('visitorId');
                //setcookie('visitorId',$visitorId,time()+60*60*24,'/');
                header('location: ../login');
            }
            exit;
        }
    }

    public static function getLocation($ip)
    {
        $url="http://api.ipinfodb.com/v3/ip-city/?key=158792b43c69065fc9f89df02dbde501c9d1fa74c88fb0fd696e5f714f3f0fe6";
        $url.="&ip=".$ip."&format=json";
        $location = file_get_contents($url);
        return json_decode($location,true);
    }
}