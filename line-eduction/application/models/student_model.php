<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
     public function get_course_by_user_id($user_id){
         $sql = "SELECT c.*,s.stud_Name,t.teac_Name
                  from edu_select_course sc,edu_course c,edu_student s,edu_teacher t
                  WHERE sc.stud_Id = s.stud_Id and sc.cour_Id = c.cour_Id and s.user_Id = $user_id and t.teac_Id = sc.teac_Id ";
            return $this->db->query($sql)->result();
     }
     public function get_stud_id_by_user($user_id){
         $sql ="SELECT s.*
          from edu_student s,edu_user u
              where s.user_Id = u.user_Id AND u.user_Id = $user_id";
         return $this->db->query($sql)->row();
     }
     public function get_teac_by_user_id($user_id){
         $sql = "SELECT DISTINCT t.*,u.user_Name
                    FROM edu_select_course sc,edu_student s,edu_teacher t,edu_user u
                    WHERE sc.stud_Id = s.stud_Id 
                    and s.user_Id = u.user_Id 
                    AND sc.teac_Id=t.teac_Id 
                    and u.user_Id = $user_id";
         return $this->db->query($sql)->result();
     }

    public function get_teac_by_user_video_id($stu_id){
        $sql = "SELECT DISTINCT t.*
                    FROM edu_buy_video a,edu_video b,edu_teacher t
                    WHERE a.video_id = b.vide_Id
                    and a.student_id = $stu_id 
                    AND b.teac_Id=t.teac_Id ";
        return $this->db->query($sql)->result();
    }

     public function save_message($teac_id,$title,$content,$user_id){
         $this->db->insert('edu_notice',array(
              'noti_Title'=>$title,
              'noti_Content'=>$content,
              'sender_Id'=>$user_id,
              'receiver_Id'=>$teac_id
         ));
         return $this->db->affected_rows();
     }
     public function get_notice_by_user_id($user_id){
        $sql = "SELECT DISTINCT  n.*,u.user_Name
                FROM edu_notice n,edu_user u
                where n.receiver_Id = $user_id AND u.user_Id = n.sender_Id";
         return $this->db->query($sql)->result();
     }
     public function get_messages_by_user_sender($user_id,$sender_id){
         $sql = "SELECT   n.*,u.user_Name,u.user_Id
                FROM edu_notice n,edu_user u
                where  u.user_Id = n.sender_Id 
                AND n.receiver_Id = $user_id and n.sender_Id=$sender_id ";
         return $this->db->query($sql)->result();
     }
     public  function get_message_by_sender_user($user_id,$sender_id){
         $sql = "SELECT   n.*,u.user_Name,u.user_Id
                    FROM edu_notice n,edu_user u
                    where  u.user_Id = n.sender_Id 
                    AND n.receiver_Id = $sender_id and n.sender_Id=$user_id ";
         return $this->db->query($sql)->result();
     }
      public function get_video_by_stu_id($student_id){
         $sql="select a.*,b.vide_url,c.cour_name
          from edu_buy_video a,edu_video b,edu_course c
          where a.video_id = b.vide_Id and a.student_id = $student_id and b.cour_Id=c.cour_Id";
          return $this->db->query($sql)->result();
}
    public function save_evaluation($stud_id,$teac_id,$score,$score_one,$score_two){
        $this->db->insert('edu_evaluate_teacher',array(
            'stud_Id'=>$stud_id,
            'teac_Id'=>$teac_id,
            'evte_Task'=>$score,
            'evte_attitude'=>$score_one,
            'evte_interact'=>$score_two
        ));
        return $this->db->affected_rows();
    }
    public function get_teac_by_user($user_id){
        $sql = "SELECT s.*
                from edu_student s,edu_user u
                where s.user_Id = u.user_Id and u.user_Id = $user_id";
        return $this->db->query($sql)->row();
    }
    public function get_eval_by_stud($stud_id){
        $sql = "SELECT et.*,t.teac_Name
            from edu_evaluate_teacher et ,edu_teacher t
            where et.stud_Id = $stud_id and t.teac_Id = et.teac_Id";
        return $this->db->query($sql)->result();
    }
    public function get_select_course_by_stud($stud_id){
        $sql = "SELECT sc.*,c.cour_Name,t.teac_Name
            from edu_select_course sc,edu_course c ,edu_teacher t
            where sc.stud_Id = $stud_id and sc.cour_Id = c.cour_Id and t.teac_Id = sc.teac_Id";
        return $this->db->query($sql)->result();
    }
    public  function get_homework_by_stud($stud_id){
        $sql = "SELECT h.*
            from edu_select_course sc,edu_homework h
            where sc.stud_Id = $stud_id and sc.teac_Id=h.teac_Id  and sc.cour_Id = h.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function get_homework_by_home_id($home_id){
        $sql ="SELECT h.* ,t.teac_Email
            from edu_homework h ,edu_teacher t
            where h.home_Id = $home_id and h.teac_Id=t.teac_Id";
        return $this->db->query($sql)->row();
    }

}