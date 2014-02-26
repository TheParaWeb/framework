<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:11 PM
 */

class Tests_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function generateSalary(){
        echo "Generate Salary<br/>";

        for($i=0;$i < 999;$i++){
            $data = array(
                'ip'=>rand(1,255).".".rand(1,255).".".rand(1,255).".".rand(1,255),
                'visitorId'=>md5(time()+rand()),
                'salary'=>rand(40000,190000)
            );
            $this->db->insert('lifestyle_results',$data);
        }
    }

}



