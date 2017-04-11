<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    public function get_course($user_id){
        $sql = "SELECT c.*,t.teac_Name from edu_teacher t,edu_course c where t.teac_Id = c.teac_Id and t.user_Id  = $user_id";
        return $this->db->query($sql)->result();
    }

    public function get_lesson_by_ti($user_id){
        $sql="select c.cour_Name,  c.cour_Credit from edu_course c, edu_select_course s, edu_teacher t where c.cour_Id=s.cour_Id and s.teac_Id=t.teac_Id and t.user_Id= $user_id";
        return $this->db->query($sql)->result();
    }
    public function get_couser_id_by_course($course){
        $sql="select cour_Id from edu_course where cour_Name = '$course'";
        return $this->db->query($sql)->row();
    }
    public function get_teac_id_by_user_id($user_id){
        $sql="select teac_Id from edu_teacher where user_Id = $user_id";
        return $this->db->query($sql)->row();
    }

    public function get_homework_by_teacher_id($tea_id){
        $sql="select * from edu_homework where teac_Id= $tea_id";
        return $this->db->query($sql)->result();
    }
    public function get_stu_by_tea_id($tea_id){
        $sql="select DISTINCT s.stud_Id ,s.stud_Name,s.stud_Email ,u.user_Name from edu_select_course c,edu_student s,edu_user u where c.teac_Id= $tea_id and c.stud_Id = s.stud_Id and u.user_Id=s.user_Id";
        return $this->db->query($sql)->result();
    }
    public function del_test($home_id){
        $sql="delete h.* from edu_homework h where h.home_Id = $home_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
   public function get_test($home_id){
       $sql = "SELECT * FROM edu_homework h where h.home_Id = $home_id";
       return $this->db->query($sql)->row();
   }
   public function update_test_by_homeid($home_id,$title,$content,$date){
       $sql = "UPDATE edu_homework h SET h.home_content='$content',h.home_End ='$date' ,h.home_Name = '$title' WHERE h.home_Id = $home_id";
       $this->db->query($sql);
       return $this->db->affected_rows();
   }
    public function save_test_by_tea_id($user_id,$name,$content,$data,$course_id,$start){
        $this->db->insert('edu_homework',array(
            'home_Id'=>null,
            'home_Name'=>$name,
            'home_content'=>$content,
            'home_Start'=>$start,
            'home_End'=>$data,
            'teac_Id'=>$user_id,
            'cour_Id'=>$course_id
        ));
        return $this->db->affected_rows();
    }
    public function get_stu_id_by_user_name($name){
        $sql="select s.stud_Id from edu_student s,edu_user u where s.user_Id=u.user_Id and u.user_Name = $name";
        return $this->db->query($sql)->row();
    }
    public function add_stu_to_tea($stu_id,$tea_id,$cour_id){
        $this->db->insert('edu_select_course',array(
            'seco_Id'=> null,
            'stud_Id'=>$stu_id,
            'cour_Id'=>$cour_id,
            'teac_Id'=>$tea_id,
        ));
        return $this->db->affected_rows();
    }
    public function get_stu_id_by_user_id($user_id){
        $sql="select user_Id from edu_user where user_Name = $user_id";
        return $this->db->query($sql)->row();
    }
    public function get_stu_or_not($stu_id,$cour_id,$tea_id){
        $sql="select * from edu_select_course where stud_Id = $stu_id and cour_Id = $cour_id and teac_Id = $tea_id";
        return $this->db->query($sql)->row();
    }
    public function del_stu($stu_name){
        $sql="delete e.* from edu_select_course e,edu_student s where s.stud_Id=e.stud_Id and s.stud_Name = '$stu_name'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function select_major(){
        $sql = "SELECT * from edu_major";
        return $this->db->query($sql)->result();
    }
    public function set_video($name,$cour_id,$tea_id,$price){
        $this->db->insert('edu_video',array(
            'vide_Url'=>$name,
            'cour_Id'=>$cour_id,
            'teac_Id'=> $tea_id,
            'vide_Price'=>$price
        ));
        return $this->db->affected_rows();
    }
    public function get_course_by_teac_id($tea_id){
        $sql = "select cour_Id,cour_Name from edu_course where teac_Id = $tea_id";
//        $this->db->query($sql);
        return $this->db->query($sql)->result();
    }
    public function get_video_course_by_ti($teac_id){
        $sql = "select v.* ,c.cour_Name from edu_video v,edu_course c
              where v.cour_Id = c.cour_Id and v.teac_id = $teac_id";
        return $this->db->query($sql)->result();
    }
    public function save_course($teac_id,$course_name){
        $this->db->insert('edu_course',array(
            'teac_Id'=> $teac_id,
            'cour_Name'=>$course_name,
        ));
        return $this->db->affected_rows();
    }
    public function save_evaluation($teac_id,$stud_id,$score,$score_one,$score_two){
        $this->db->insert('edu_evaluate_student',array(
            'stud_Id'=>$stud_id,
            'teac_Id'=>$teac_id,
            'time'=>$score,
            'task'=>$score_one,
            'test'=>$score_two
        ));
        return $this->db->affected_rows();
    }
    public function get_evaluate_by_teac($teac_id){
        $sql = "SELECT es.*,s.stud_Name
                from edu_evaluate_student es ,edu_student s
                where es.teac_Id= $teac_id and es.stud_Id = s.stud_Id";
        return $this->db->query($sql)->result();
    }
    public function save_message_teacher($stud_id,$title,$content,$user_id){
        $this->db->insert('edu_notice',array(
            'noti_Title'=>$title,
            'noti_Content'=>$content,
            'receiver_Id'=>$stud_id,
            'sender_Id'=>$user_id

        ));
        return $this->db->affected_rows();
    }
    public function get_all_course($teac_id){
        $sql ="SELECT * from edu_course WHERE teac_Id = $teac_id";
        return $this->db->query($sql)->result();
    }
    public function get_select_course_by_teac($teac_id){
        $sql = "select sc.*,c.cour_Name,s.stud_Name,u.user_Name
                from edu_course c,edu_select_course sc,edu_student s,edu_user u
                where c.cour_Id = sc.cour_Id and sc.teac_Id = $teac_id and sc.stud_Id = s.stud_Id and s.user_Id = u.user_Id";
        return $this->db->query($sql)->result();
    }
    public function get_homework_by_teac_cour($teac_id,$cour_id){
        $sql = "SELECT * FROM edu_homework where teac_Id = $teac_id and cour_Id =$cour_id";
        return $this->db->query($sql)->result();
    }
    public function save_grade($grade,$teac_id,$stud_id,$cour_id){
        $sql = "UPDATE edu_select_course set seco_Grade = $grade where teac_Id = $teac_id and cour_Id = $cour_id and stud_Id = $stud_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_secograde_by_teac_cour_stud($stud_id,$teac_id,$cour_id){
        $sql = "select seco_Grade from edu_select_course where teac_Id = $teac_id and cour_Id = $cour_id and stud_Id = $stud_id";
        return $this->db->query($sql)->row();
    }
}