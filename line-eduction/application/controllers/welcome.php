 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function shouye(){
        $this->load->view('shouye');
    }
 	public function login(){
		$this->load->view('login');
	}

    public function check_name()
    {
        $name=$this->input->get('uname');
        $this->load->model('user_modol');
        $result=$this->user_modol->get_by_name_name($name);
        if($result){
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    public function check_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_modol');
        $this->load->model('student_model');
        $this->load->model('teacher_model');
        $result=$this->user_modol->get_by_name_pwd($username,$password);
        if($result){
            $this->session->set_userdata('logindata',$result);
            $loginID = $this -> session -> userdata('logindata');
            $senders = $this->student_model->get_notice_by_user_id($result->user_Id);
            $this->session->set_userdata('senders',$senders);
            $user_Power=$loginID->user_Power;
            if($user_Power==1){
                $student = $this->student_model->get_stud_id_by_user($result->user_Id);
                if($student){
                    redirect('student/lesson');
                }else{
                    redirect('student/introduce');
                }
            }else{
                $teacher=$this->teacher_model->get_teac_id_by_user_id($result->user_Id);
                if($teacher){
                    redirect('teacher/t_lesson');
                }else{
                    redirect('teacher/t_introduce');
                }
            }
        }else{
            redirect('welcome/login');
        }
    }

    public function stud_teach(){
        $this->load->model('student_model');
        $this->load->model('teacher_model');
        $user = $this -> session -> userdata('logindata');
        $user_Power = $user->user_Power;
        if($user_Power==1){
            $student = $this->student_model->get_stud_id_by_user($user->user_Id);
            if($student){
                redirect('student/lesson');
            }else{
                redirect('student/introduce');
            }
        }else{
            $teacher=$this->teacher_model->get_teac_id_by_user_id($user->user_Id);
            if($teacher){
                redirect('teacher/t_lesson');
            }else{
                redirect('teacher/t_introduce');
            }
        }
    }

    public  function do_reg(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->model('user_modol');
        if(strlen($username) == 10){
            $row = $this->user_modol->save($username, $password, 1);
        }else{
            $row = $this->user_modol->save($username, $password, 2);
        }
        if($row>0){
            redirect('welcome/login');
        }else{
            redirect('student/reg');
        }
    }

    public function login_out(){
        $this->session->unset_userdata('logindata');
        redirect('welcome/shouye');
    }
}


