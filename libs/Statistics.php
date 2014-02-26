<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/27/14
 * Time: 10:26 AM
 */

class Statistics
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    /**
     * insertPageView
     * @param string $page The page url. ex. admin/admin
     * @return null
     */
   public function insertPageView($page = ''){

       $page = URL.$page;
       $data = array(
           'ip'=>$_SERVER['REMOTE_ADDR'],
           'userAgent'=>Session::get('userAgent'),
           'visitorId'=>Session::get('visitorId'),
           'page'=>$page
       );
       $this->db->insert('page_views',$data);
   }

    /**
     * insertLifestyleResult
     * @param string $visitorId
     * @param int $salary
     * @return null
     */
   public function insertLifestyleResult($visitorId,$salary){
       $result = $this->db->select("SELECT * FROM lifestyle_results WHERE visitorId = :visitorId AND salary = :salary",
           array(':visitorId'=>$visitorId,':salary'=>$salary));
       if(count($result)==0){
           $data=array(
               'ip'=>$_SERVER['REMOTE_ADDR'],
               'visitorId'=>$visitorId,
               'salary'=>$salary
           );
           $this->db->insert('lifestyle_results',$data);
       }
   }

    public function getPageViews(){
        $totalPageViews = $this->db->select("SELECT * FROM page_views",array());
        print_r($totalPageViews);die;
    }

    public function getSchools($active = false)
    {
        if ($active) {
            $result = $this->db->select("SELECT * FROM schools WHERE active = '1' ORDER BY district", array());
        } else {
            $result = $this->db->select("SELECT * FROM schools ORDER BY district", array());
        }
        return $result;
    }

    public function getStudentsBySchool($school){
        return $this->db->select("SELECT * FROM students WHERE school = :school",array(':school'=>$school));
    }

    public function getPageViewsByMonth($month){
        $pageViews = $this->db->select("SELECT * FROM page_views",array());
        $totalPageViews = 0;
        foreach($pageViews AS $pageView){
            $timestamp = $pageView['timestamp'];
            $timestamp = explode(' ',$timestamp);
            $date=$timestamp[0];
            $date = explode('-',$date);
            $thisMonth=$date[1];
            if($thisMonth==$month){
                $totalPageViews++;
            }
        }
        return $totalPageViews;

    }

    public function getRegisteredUsersMonth($month){
        $students = $this->db->select("SELECT * FROM students",array());
        $totalStudents = 0;

        foreach($students AS $student){
            $timestamp = $student['timestamp'];
            $timestamp = explode(' ',$timestamp);
            $date=$timestamp[0];
            $date = explode('-',$date);
            $thisMonth=$date[1];
            if($thisMonth==$month){
                $totalStudents++;
            }
        }
        return $totalStudents;

    }

    public function getUniqueVisitorsByMonth($month){
        $visitors = $this->db->select("SELECT * FROM page_views GROUP BY visitorId",array());
        $totalVisitors = 0;

        foreach($visitors AS $visitor){
            $timestamp = $visitor['timestamp'];
            $timestamp = explode(' ',$timestamp);
            $date=$timestamp[0];
            $date = explode('-',$date);
            $thisMonth=$date[1];
            if($thisMonth==$month){
                $totalVisitors++;
            }
        }
        return $totalVisitors;
    }

}