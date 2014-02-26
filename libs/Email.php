<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/27/14
 * Time: 2:02 PM
 */

class Email
{

    function __construct()
    {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        Session::sessionStart('MTC_STUDENT');
        $this->student = new Student();
        $this->lifestyle = new Lifestyle();
    }

    public function sendShareMail($email = ''){
        $student = $this->student->getStudentInfo(Session::get('visitorId'));
        $student = $student[0];
        $nameFirst = explode(" ",$student['name']);
        $nameFirst = $nameFirst[0];
        $jobs = $this->lifestyle->getJobs($student['salary'],5);
        $to = $email;
        $subject = $student['name'].'\'s Midlands Tech Lifestyle Quiz Results';
        $headers = "From: ".$student['email']."\r\n";
        $headers .= "Reply-To: info@mtcquiz.com\r\n";
        $headers .= "CC: ".QUIZ_CC."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = "<html>";
        $message.= "<head><meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\"></head>";
        $message.= "<body style=\"margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; padding-top: 0px; padding-right: 0; padding-bottom: 0; padding-left: 0;\" bgcolor=\"#f9f9f9\">";
        $message.= "<table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"f9f9f9\" border=\"0\">";
        $message.= "<tr>";
        $message.= "<td colspan=\"10\">";
        $message.= "<a href=\"" . URL . "\" border=\"0\" style=\"border: none;\">";
        $message.= "<img src=\"".URL."public/images/logo-email.gif\" alt=\"Midlands Technical College\" width=\"600\" height=\"146\" style=\"display: block; border: 0;\">";
        $message.= "</a>";
        $message.= "</td>";
        $message.= "</tr>";
        $message.= "<tr>";
        $message.= "<td colspan=\"10\" width=\"550\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #4c4d4e; padding-top: 15px; padding-right: 25px; padding-bottom: 15px; padding-left: 25px;\">";
        $message.= "<h1 style=\"color: #0b9cd8; font-size: 42px; margin-top: 0px; margin-bottom: 0px; text-align: center;\">".$student['name']."</h1>";
        $message.= "</td>";
        $message.= "</tr>";
        $message.= "<tr>";
        $message.= "<td colspan=\"5\" width=\"265\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #4c4d4e; padding-top: 15px; padding-right: 20px; padding-bottom: 15px; padding-left: 25px; vertical-align: top;\">";
        $message.= "<h4 style=\"margin-top: 10px; margin-bottom: 5px; text-align: center;\">Based on the results of this quiz, $nameFirst will need a salary of:</h4>";
        $message.= "<h1 style=\"color: #9cde3a; margin-top: 0px; text-align: center;\">".number_format($student['salary'])." <span style=\"color: #4c4d4e;\">yr.</h1>";
        $message.= "</td>";
        $message.= "<td colspan=\"5\" width=\"289\" style=\"border-left: 1px solid #e6e6e6; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #4c4d4e; padding-top: 15px; padding-right: 0px; padding-bottom: 15px; padding-left: 0px; vertical-align: top;\">";
        $message.= "<h4 style=\"margin-top: 10px; margin-bottom: 5px; text-align: center;\">Jobs with this salary:</h4>";
        $message.= "<table cellpadding=\"0\" cellspacing=\"0\">";
        foreach($jobs as $job){
            $message.= "<tr>";
            $message.= "<td colspan=\"1\" width=\"135\" style=\"color: #f72549; padding-right: 5px; padding-bottom: 5px; text-align: center;\">".$job['jobTitle']."</td>";
            $message.= "<td colspan=\"1\" width=\"120\" style=\"color: #f72549; padding-right: 25px; padding-bottom: 5px; padding-left: 5px; text-align: center;\">".$job['salary']."</td>";
            $message.= "</tr>";
        }
        $message.= "</table>";
        $message.= "</td>";
        $message.= "</tr>";
        $message.= "<tr>";
        $message.= "<td colspan=\"10\" width=\"550\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #4c4d4e; padding-top: 0px; padding-right: 25px; padding-bottom: 15px; padding-left: 25px;\">";
        $message.= "<p style=\"margin-top: 10px; margin-bottom: 10px; text-align: justify;\">$nameFirst has chosen to share their results from the Midlands Technical College Lifestyle Quiz with you. This quiz evaluates a student's necessary income based on their ideal lifestyle choices. Based on these results, please discuss with this student the educational options available to achieve their dreams.</p>";
        $message.= "</td>";
        $message.= "</tr>";
        $message.= "<tr>";
        $message.= "<td colspan=\"2\" bgcolor=\"#fff200\" width=\"120\" height=\"21\"></td>";
        $message.= "<td colspan=\"2\" bgcolor=\"#f72549\" width=\"120\" height=\"21\"></td>";
        $message.= "<td colspan=\"2\" bgcolor=\"#0b9cd8\" width=\"120\" height=\"21\"></td>";
        $message.= "<td colspan=\"2\" bgcolor=\"#faa819\" width=\"120\" height=\"21\"></td>";
        $message.= "<td colspan=\"2\" bgcolor=\"#9cde3a\" width=\"120\" height=\"21\"></td>";
        $message.= "</tr>";
        $message.= "</table>";
        $message.= "</body></html>";
        return $this->send($to,$subject,$message,$headers);
    }

    /**
     * send
     * @param string $to Primary email address
     * @param string $subject Email Subject
     * @param string $message Email message (html)
     * @param string $headers Email headers.
     * @return bool
     */
    public function send($to,$subject,$message,$headers){
        return mail($to,$subject,$message,$headers);
    }

}