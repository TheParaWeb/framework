<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/16/13
 * Time: 12:24 PM
 */

class Cookie
{

    /**
     * @param string $name The name of the cookie.
     * @param array $array The array to serialize into the cookie.
     * @param int $time The expiration data of the cookie.
     */


    static function setCookie()
    {
        if(isset($_SESSION['visitorId'])){
            $visitorId = Session::get('visitorId');
            setcookie('visitorId',$visitorId,time()+60*60*24*7,'/');
        }
    }

    static function destroyCookie(){
        if(isset($_SESSION['visitorId'])){
            $visitorId = Session::get('visitorId');
            setcookie('visitorId',$visitorId,time()-60*60*24*7,'/');
        }
    }

    static function get($key = 'visitorId')
    {
        return $_COOKIE[$key];
    }

    static function addArrayToCookie($name, $array)
    {
        setcookie($name, urlencode(serialize($array)), time() - (86400 * 7));
    }

    static function getArrayFromCookie($name)
    {
        return unserialize(urldecode($_COOKIE[$name]));
    }

}