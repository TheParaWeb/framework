<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/23/14
 * Time: 9:44 AM
 */

class Resume_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->visitorId = Session::get('visitorId');
        $this->lifestyle = new Lifestyle();
    }

    public function getQuestionIndex(){
        $questionIndex = $this->lifestyle->resumeLifestyleQuiz();
        return $questionIndex;
    }

    public function clearAnswers(){
        $this->db->delete('lifestyle_answers','visitorId = {$this->visitorId}',999);
    }

}