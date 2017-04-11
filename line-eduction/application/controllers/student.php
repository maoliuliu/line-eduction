<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }
    public function shouye(){
        $this->load->view('shouye');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function introduce(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $this->load->view('introduce',array(
            'courses'=>$courses,
            'student'=>$student,
        ));
    }
    public function lesson(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        $this->load->view('lesson',array(
            'courses'=>$courses,
            'student'=>$student,
        ));
    }
    public function lessoned(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $teachers = $this->student_model->get_teac_by_user_video_id($student->stud_Id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);

        $this->load->view('lessoned',array(
            'courses'=>$courses,
            'teachers'=>$teachers
        ));
    }
    public function evaluate()
    {
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $this->load->view('evaluate',array(
            'courses'=>$courses
        ));
    }
    public function view_evaluate()
    {
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $this->load->view('view_evaluate',array(
            'courses'=>$courses
        ));
    }
    public function do_itro(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('user_modol');
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $gender=$this->input->post('gender');
        $grade=$this->input->post('grade');
        $this->load->model('user_modol');
//        $result=$this->user_modol->get_morid_by_mor($mor);
        if(strstr($email,'@')){
            $row=$this->user_modol->save_student_news($username,$email,$gender,$grade, $user_id);
            if($row>0){
                redirect('student/lesson');
            }else{
                $this->load->view('introduce');
            }
        }else{
            $this->load->view('introduce');
        }
    }
    public function send_message(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);;
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        $teac_id = $this->input->get('teac_id');
         $this->load->view('sendMsg',array(
             'courses'=>$courses,
             'teac_id'=>$teac_id
         ));
    }
    public function save_message(){
        $teac_id = $this->input->get('teac_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $result = $this->student_model->save_message($teac_id,$title,$content,$user_id);
        if($result){
            redirect('student/lessoned');
        }else{
            echo "留言成功！";
        }
    }
    public function see_message(){
        $sender_id = $this->input->get('sender_id');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $messages_one = $this->student_model->get_messages_by_user_sender($user_id,$sender_id);
        $message_two =$this->student_model->get_message_by_sender_user($user_id,$sender_id);
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $this->load->view('see_message',array(
            'messages_one'=>$messages_one,
            'messages_two'=>$message_two,
            'courses'=>$courses
        ));
    }
    public function choose_lesson(){
        $this->load->model('user_modol');
        $videos = $this->user_modol->get_vide();
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
//        $courses = $this->student_model->get_course_by_user_id($user_id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        $this->load->view('s_choose_lesson',array(
            'videos'=>$videos,
            'courses'=>$courses
        ));
    }
    public function attempt_watch(){
        $video_id = $this->input->get('id');
        $this->load->model('user_modol');
        $result = $this->user_modol->get_video_by_id($video_id);
        if($result){
            $this->load->view('attempt_watch',array(
                'result'=>$result
            ));
        }
    }
    public function s_buy_video(){
        $this->load->model('user_modol');
        $video_id = $this->input->get('id');
        $result = $this->user_modol->get_video_by_id($video_id);
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);

        if($result){
            $this->load->view('s_buy_video',array(
                'courses'=>$courses,
                'result'=>$result
            ));
        }
    }
    public function buy_video_true(){
        $this->load->model('student_model');
        $this->load->model('user_modol');
        $video_id = $this->input->get('id');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $tea_cour=$this->user_modol->get_tea_cour_by_vid($video_id);
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $this->user_modol->save_stu__video($video_id,$student->stud_Id);
        $this->user_modol->save_stu_tea_cour($student->stud_Id,$tea_cour->teac_Id,$tea_cour->cour_Id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        $this->load->view('s_buy_video_true',array(
            'courses'=>$courses
        ));
    }
    public function s_watch(){
        $video_id = $this->input->get('id');
        $this->load->model('user_modol');
        $result = $this->user_modol->get_video_by_id($video_id);
        if($result){
            $this->load->view('s_watch',array(
                'result'=>$result
            ));
        }
    }
    public function s_del_video(){
        $video_id = $this->input->get('id');
        $this->load->model('user_modol');
        $this->load->model('student_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $result = $this->user_modol->del_video_by_id($video_id,$student->stud_Id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        if($result){
            $this->load->view('s_del_video',array(
                'courses'=>$courses
            ));
        }
    }
    public function parents(){
        $this->load->model('user_modol');
        $this->load->model('student_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $result = $this->user_modol->get_parent_by_user_id($user_id);
        $courses = $this->student_model->get_video_by_stu_id($student->stud_Id);
        if($result){
            $comments = $this->user_modol->get_comments();
            $this->load->view('s_parents',array(
                'courses'=>$courses,
                'result'=>$result,
                'comments'=>$comments
            ));
        }else{
            $this->load->view('s_reg_parent',array(
               'courses'=>$courses
            ));
        }
    }
    public function reg_parent(){
        $this->load->model('user_modol');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $student = $this->student_model->get_stud_id_by_user($user_id);
        $parent_name = $this->input->post('username');
        $result =$this->user_modol->save_parent($user_id,$parent_name);
       if($result){
           redirect('student/parents');
       }
    }
    public function parent_comment(){
        $this->load->model('user_modol');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $parent_id = $this->user_modol->get_parent_by_user_id($user_id)->parent_id;
        $content=$this->input->get('comment_content');
        $result=$this->user_modol->save_comment($parent_id,$content);
        if($result){
            redirect('student/parents');
        }
    }




    public function see_grade_stud(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $stud = $this->student_model->get_teac_by_user($user_id);
        $select_courses = $this->student_model->get_select_course_by_stud($stud->stud_Id);
        $this->load->view('see_grade_stud',array(
            'courses'=>$courses,
            'select_courses'=>$select_courses
        ));
    }
    public function my_evaluate(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $teachers = $this->student_model->get_teac_by_user_id($user_id);
        $stud = $this->student_model->get_teac_by_user($user_id);
        $my_evaluate = $this->student_model->get_eval_by_stud($stud->stud_Id);
        $this->load->view('my_evaluate',array(
            'courses'=>$courses,
            'teachers'=>$teachers,
            'my_evaluate'=>$my_evaluate
        ));
    }
    public function add_evaluation(){
        $teac_id = $this->input->get('id');
        $score = $this->input->post("info");
        $score_one = $this->input->post("info_one");
        $score_two = $this->input->post("info_two");
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $stud = $this->student_model->get_teac_by_user($user_id);
        $result = $this->student_model->save_evaluation($stud->stud_Id,$teac_id,$score,$score_one,$score_two);
        if($result){
            redirect('student/my_evaluate');
        }else{
            echo "err";
        }
    }
    public function see_homework(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $stud = $this->student_model->get_teac_by_user($user_id);
        $homeworks = $this->student_model->get_homework_by_stud($stud->stud_Id);
        $this->load->view('see_homework',array(
            'courses'=>$courses,
            'homeworks'=>$homeworks
        ));
    }
    public function see_home_content(){
        $home_id = $this->input->get('id');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->student_model->get_course_by_user_id($user_id);
        $homework = $this->student_model->get_homework_by_home_id($home_id);
        $this->load->view('see_home_content',array(
            'courses'=>$courses,
            'homework'=>$homework
        ));
    }

}
