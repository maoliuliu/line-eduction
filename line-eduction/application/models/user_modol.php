 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_modol extends CI_Model {

	public function save($username,$password,$len)
	{
		$this->db->insert('edu_user',array(
			'user_Name'=>$username,
			'user_Pwd'=>$password,
			'user_Power'=>$len
		));
		return $this->db->affected_rows();
	}
	public function get_by_name_name($name){
		$query= $this->db->get_where('edu_user',array(
				'user_Name'=>$name
		));
		return $query->row();
	}
	public function get_by_name_pwd($name,$pwd){
		$query= $this->db->get_where('edu_user',array(
				'user_Name'=>$name,
				'user_Pwd'=>$pwd
		));
		return $query->row();
	}
    public function save_student_news($username,$email,$gender,$grade, $user_id){
        $this->db->insert('edu_student',array(
            'stud_Name'=>$username,
            'stud_Email'=>$email,
            'stud_Sex'=>$gender,
            'grade'=>$grade,
            'user_Id'=>$user_id
        ));
        return $this->db->affected_rows();
    }

	public function save_new_teacher_news($username,$email,$gender,$major_id,$title,$user_id ){
        $this->db->insert('edu_teacher',array(
            'teac_Name'=>$username,
            'teac_Email'=>$email,
            'teac_Sex'=>$gender,
            'major_Id'=>$major_id,
            'teac_Title'=>$title,
            'user_Id'=>$user_id
        ));
        return $this->db->affected_rows();
    }
	public function get_morid_by_mor($mor){
		$sql="select dept_Id from edu_department where majo_Name = $mor";
		return $this->db->query($sql)->result();
	}
	public function get_decid_by_dec($dec){
		$sql="select majo_Id from edu_major where majo_Name = $dec";
		return $this->db->query($sql)->result();
	}
    public function get_video_by_id($dec){
        $sql="select * from edu_video where vide_Id = $dec";
        return $this->db->query($sql)->row();
    }
    public function get_vide(){
        $sql = "select v.* ,c.cour_Name from edu_video v,edu_course c
              where v.cour_Id = c.cour_Id";
        return $this->db->query($sql)->result();
    }
    public function save_stu__video($video_id,$student){
        $this->db->insert('edu_buy_video',array(
            'video_id'=>$video_id,
            'student_id'=>$student,
        ));
        return $this->db->affected_rows();
    }
    public function get_tea_cour_by_vid($video_id){
        $sql = "select teac_Id,cour_Id from edu_video
              where vide_Id = $video_id";
        return $this->db->query($sql)->row();
    }
    public  function save_stu_tea_cour($student,$tea,$cour){
        $this->db->insert('edu_select_course',array(
            'stud_Id'=>$student,
            'cour_Id'=>$cour,
            'teac_Id'=>$tea
        ));
         return $this->db->affected_rows();
}
    public function del_video_by_id($video_id,$stu_id){
        $sql="delete  from edu_buy_video where video_id = $video_id and student_id = $stu_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_parent_by_user_id($user_id){
        $sql="select * from edu_parents where child_id = $user_id";
        return $this->db->query($sql)->row();
    }
    public function save_parent($user_id,$parent_name){
        $this->db->insert('edu_parents',array(
            'child_id'=>$user_id,
            'parent_name'=>$parent_name,
        ));
        return $this->db->affected_rows();
    }
    public function get_comments(){
        $sql="select a.*,b.parent_name 
              from edu_parent_comment a,edu_parents b 
              where a.parent_id = b.parent_id";
        return $this->db->query($sql)->result();
    }
    public function save_comment($parent_id,$content){
        $this->db->insert('edu_parent_comment',array(
            'parent_id'=>$parent_id,
            'comment_content'=>$content,
        ));
        return $this->db->affected_rows();
    }
}
