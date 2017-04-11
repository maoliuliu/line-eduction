<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller{
    public function t_index()
    {
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $courses = $this->teacher_model->get_course($user_id);
        $teacher=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $this->load->view('t_index',array(
            'courses'=>$courses,
              'teacher'=>$teacher
        ));
    }
    public function t_reg(){
        $this->load->view('t_reg');
    }
    public function dot_itro(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $username=$this->input->post('username');
        $email=$this->input->post('email');
        $gender=$this->input->post('gender');
        $major_id=$this->input->post('mor');
        $title = $this->input->post('title');
        $this->load->model('user_modol');
        if(strstr($email,'@')){
            $row=$this->user_modol->save_new_teacher_news($username,$email,$gender,$major_id,$title,$user_id);
            if($row>0){
                redirect('teacher/t_lesson');
            }else{
                $this->load->view('t_introduce');
            }
        }else{
            $this->load->view('t_introduce');
        }
    }
    public function t_view_evaluation()
    {
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $stud_id = $this->input->get('id');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $this->load->view('t_view_evaluation',array(
            'courses'=>$courses,
            'stud_id'=>$stud_id
        ));
    }
    public function t_stu_information()
    {
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_stu_by_tea_id($teac_id->teac_Id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
//      $courses = $this->teacher_model->get_course($user_id);
            $this->load->view('t_stu_information',array(
                'results'=>$results,
                'courses'=>$courses
            ));
    }
    public function add_stu(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $name=$this->input->post('name');
        $course=$this->input->post('course');
        $this->load->model('teacher_model');
        $stu_id=$this->teacher_model->get_stu_id_by_user_name($name);
        $tea_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $cour_id=$this->teacher_model->get_couser_id_by_course($course);
        $res=$this->teacher_model->get_stu_or_not($stu_id->stud_Id,$cour_id->cour_Id,$tea_id->teac_Id);
        $row = 0;
        if(!$res){
            $row = $this->teacher_model->add_stu_to_tea($stu_id->stud_Id,$tea_id->teac_Id,$cour_id->cour_Id);
        }
        if($row>0){
            redirect('teacher/t_stu_information');
        }else{
            $this->load->view('t_stu_information',array(
               'str' => "该学生已经选择该课程！"
            ));
        }
    }
    public function del_stu(){
        $stu_name=$this->input->get('name');
        $this->load->model('teacher_model');
        $row=$this->teacher_model->del_stu($stu_name);
        if($row>0){
            redirect('teacher/t_stu_information');
        }else{
            echo 'erro';
        }
    }

    public function t_introduce()
    {
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $courses = $this->teacher_model->get_course($user_id);
        $majors = $this->teacher_model->select_major();
        $teacher=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $this->load->view('t_introduce',array(
            'courses'=>$courses,
            'majors'=>$majors,
            'teacher'=>$teacher
        ));
    }
    public function t_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_homework_by_teacher_id($teac_id->teac_Id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
//        $courses = $this->teacher_model->get_course($user_id);
        $this->load->view('t_test',array(
            'results'=>$results,
            'courses'=>$courses
        ));
    }
    public function t_see_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $home_id = $this ->input->get('id');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses = $this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $test = $this->teacher_model->get_test($home_id);
        $this->load->view('t_see_test',array(
            'courses'=>$courses,
            'test'=>$test
        ));
    }
    public function del_test(){
        $home_id = $this->input->get('id');
        $this->load->model('teacher_model');
        $row = $this->teacher_model->del_test($home_id);
        if($row>0){
            redirect('teacher/t_test');
        }else{
            echo 'erro';
        }
    }
    public function t_add_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses = $this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $results = $this->teacher_model->get_course_by_teac_id($teac_id->teac_Id);
        $this->load->view('t_add_test',array(
            'courses'=>$courses,
            'results'=>$results
        ));
    }
    public function add_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $name=$this->input->post('name');
        $content=$this->input->post('content');
        $data=$this->input->post('data');
        $this->load->model('teacher_model');
        $course_id = $this->input->post('course');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $start=date("Y-m-d");
        $row=$this->teacher_model->save_test_by_tea_id($teac_id->teac_Id,$name,$content,$data,$course_id,$start);
        if($row){
            redirect('teacher/t_test');
        }
    }
    public function t_change_test(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $home_id = $this ->input->get('id');
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses = $this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $test = $this->teacher_model->get_test($home_id);
        $this->load->view('t_change_test',array(
            'courses'=>$courses,
            'test'=>$test
        ));
    }
    public function update_test(){
         $title = $this->input->post('title');
         $content = $this->input->post('content');
         $date = $this->input->post('date');
         $home_id = $this->input->get('id');
         $this->load->model('teacher_model');
         $result = $this->teacher_model->update_test_by_homeid($home_id,$title,$content,$date);
        if($result){
            redirect("teacher/t_see_test?id=$home_id");
        }
    }
    public function t_lesson(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $results = $this->teacher_model->get_course($user_id);
        $this->load->view('t_lesson',array(
            'courses'=>$courses,
            'results'=>$results
        ));
    }
    public function t_up_lesson1(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $this->load->view('t_up_lesson1',array(
            'courses'=>$courses,
        ));
    }
    public function t_choose_stu(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $results=$this->teacher_model->get_stu_by_tea_id($teac_id->teac_Id);
//        $courses = $this->teacher_model->get_course($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $this->load->view('t_choose_stu',array(
            'results'=>$results,
            'courses'=>$courses
        ));
    }
    public function t_sor(){
        $this->load->view('t_sor');
    }
    public function t_insert_sor(){
        $this->load->view('t_insert_sor');
    }
    public function t_up_lesson(){
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
       $results = $this->teacher_model->get_course_by_teac_id($teac_id->teac_Id);
        $this->load->view('t_up_lesson',array(
            'results'=> $results,
            'courses'=> $courses
        ));
    }
    public function t_up(){
        $filePath='assets/vedio/';
        if(!is_dir($filePath)){
            mkdir($filePath);
        }
        $type=array("mp4");
        in_array((strtolower(substr(strchr($_FILES['file']['name'],'.'),1))),$type);
        $fileType = implode(',',$type);
        $filename = $_FILES['file']['name'];
        $filename = time();
        $filename = $filename.(strchr($_FILES['file']['name'],'.'));
        $file = $_FILES['file']['name'];
        if(file_exists($filePath)){
            $bool=move_uploaded_file($_FILES['file']['tmp_name'],$filePath.$_FILES['file']['name']);
            if($bool){
                $str='上传成功';
                $user_id=$this -> session -> userdata('logindata')->user_Id;
                $course_id = $this->input->post('course');
                $price = $this->input->post('price');
                $this->load->model('teacher_model');
                $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
                $row = $this->teacher_model->set_video($_FILES['file']['name'],$course_id,$teac_id->teac_Id,$price);
                $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
                $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
                if($row){
                    $this->load->view('t_up_lesson1',array(
                        'str' => $str,
                        'courses'=> $courses,
                    ));
                }
            }else{
                $str='请选择正确格式的文件';
                $this->load->view('t_up_lesson1',array(
                    'str' => $str,
                ));

            }
        }else{
            echo 'no file name';
        }
    }

    public function t_watch(){
        $video_id = $this->input->get('id');
        $this->load->model('user_modol');
        $result = $this->user_modol->get_video_by_id($video_id);
        if($result){
            $this->load->view('t_watch',array(
                'result'=>$result
            ));
        }
    }

    public function t_admin_lesson(){
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses=$this->teacher_model->get_video_course_by_ti($teac_id->teac_Id);
        $results = $this->teacher_model->get_course_by_teac_id($teac_id->teac_Id);
        $this->load->view('t_admin_lesson',array(
            'courses'=>$courses,
            'results'=>$results
        ));
    }

    public function teacher_add_course(){
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $course_name = $this->input->get('newCourse');
        $result = $this->teacher_model->save_course($teac_id->teac_Id,$course_name);
        if($result){
            redirect('teacher/t_admin_lesson');
        }
    }

    public function see_evaluate(){
        $user=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $courses = $this->teacher_model->get_course($user);
        $teac_id= $this->teacher_model->get_teac_id_by_user_id($user);
        $my_evaluate = $this->teacher_model->get_evaluate_by_teac($teac_id->teac_Id);
        $this->load->view('see_evaluate',array(
            'courses'=>$courses,
            'my_evaluate'=>$my_evaluate
        ));
    }
    public function add_evaluation(){
        $stud_id = $this->input->post('stu-id');
        $score = $this->input->post("info");
        $score_one = $this->input->post("info_one");
        $score_two = $this->input->post("info_two");
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $result = $this->teacher_model->save_evaluation($teac_id->teac_Id,$stud_id,$score,$score_one,$score_two);
        if($result){
            redirect('teacher/t_choose_stu');
        }else{
            echo "err";
        }

    }
    public function send_message(){
        $stud_id = $this->input->get('stud_id');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $this->load->model('teacher_model');
        $courses = $this->teacher_model->get_course($user_id);
        $this->load->view('t_save_message',array(
            'stud_id'=>$stud_id,
            'courses'=>$courses
        ));
    }
    public function save_message(){
        $this->load->model('teacher_model');
        $stud_id = $this->input->get('stud_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $result = $this->teacher_model->save_message_teacher($stud_id,$title,$content,$user_id);
        if($result){
            redirect('teacher/t_stu_information');
        }else{
            echo "留言失败！";
        }
    }
    public function add_grade(){
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses = $this->teacher_model->get_course($user_id);
        $select_course = $this->teacher_model->get_select_course_by_teac($teac_id->teac_Id);
        if($select_course){
            $this->load->view('t_add_grade',array(
                'select_course'=>$select_course,
                'courses'=>$courses
            ));
        }else{
            echo 'err';
        }
    }
    public function amend_enter(){
        $stud_id = $this->input->get('stud_id');
        $cour_id = $this->input->get('cour_id');
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $courses = $this->teacher_model->get_course($user_id);
        $homeworks = $this->teacher_model->get_homework_by_teac_cour($teac_id->teac_Id,$cour_id);
        $secograde=$this->teacher_model->get_secograde_by_teac_cour_stud($stud_id,$teac_id->teac_Id,$cour_id);
        if($homeworks){
            $this->load->view('t_amend_enter',array(
                'courses' =>$courses ,
                'homeworks' =>$homeworks,
                'stud_id'=>$stud_id,
                'cour_id'=>$cour_id,
                'secograde'=>$secograde
            ));
        }else{
            echo 'err';
        }
    }
    public function enter_grade(){
        $grade = $this->input->post('enter');
        $stud_id = $this->input->get('stud_id');
        $cour_id = $this->input->get('cour_id');
        $this->load->model('teacher_model');
        $user_id=$this -> session -> userdata('logindata')->user_Id;
        $teac_id=$this->teacher_model->get_teac_id_by_user_id($user_id);
        $result = $this->teacher_model->save_grade($grade,$teac_id->teac_Id,$stud_id,$cour_id);
        if($result){
            redirect('teacher/add_grade');
        }else{
            echo 'err';
        }
    }
}