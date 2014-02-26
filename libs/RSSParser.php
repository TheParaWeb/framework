<?php
class RSSParser{
    function __construct(){

    }

    function getRSS($feed){
        $this -> feed = $feed;
        $rss = simplexml_load_file($this->feed);
        $data = array();
        print_r($rss->channel->item);
        die;
    }

}