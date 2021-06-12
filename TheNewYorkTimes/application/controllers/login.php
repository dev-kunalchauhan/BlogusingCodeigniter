<?php

class login extends MY_Controller
{

    public function __construct()
  {
    parent::__construct();
    if( $this->session->userdata('id') )
    return redirect('admin/welcome');
  }


    public function index()
    {
        $this->form_validation->set_rules('uname','User Name','required|alpha');
        $this->form_validation->set_rules('pass','Password','required|max_length[12]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run())
        {
           $uname = $this->input->post('uname');
           $pass = $this->input->post('pass');
           $this->load->model('loginmodel');
           $login_id = $this->loginmodel->isvalidate($uname,$pass);
          
           if($login_id) 
           {
               $myname = $this->session->set_userdata('id',$login_id);
               return redirect('admin/welcome');
           }
           else 
           {
                $this->session->set_flashdata('Login_failed','Invalid Username/Password');
                return redirect('login');
           }   
        }
        else 
        {
            $this->load->view('Admin/login');
        }
    }


    public function sendmail()
    {
        $this->form_validation->set_rules('username','User Name','required|alpha');
        $this->form_validation->set_rules('password','Password','required|max_length[12]');
        $this->form_validation->set_rules('firstname','First Name','required|max_length[12]');
        $this->form_validation->set_rules('lastname','Last Name','required|max_length[12]');
        $this->form_validation->set_rules('mobileno','Mobile No','required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if($this->form_validation->run())
        {
          $post = $this->input->post();
          $this->load->model('loginmodel','user');
          if($this->user->add_user($post))
          {
            $this->session->set_flashdata('user','User Added Successfully');
            $this->session->set_flashdata('user_class','alert-success');
            
          }
          else
          {
            $this->session->set_flashdata('user','User not added, Please try aagain!!!');
            $this->session->set_flashdata('user_class','alert-success');
          }
          return redirect('admin/register');

          // $this->load->library('email');
          // $message = 'I hope everyone is fine.';
          // $this->email->from(set_value("email"),set_value('firstname'));
          // $this->email->to("kunal.chauhan772@gmail.com");
          // $this->email->subject('Testing Mail functionality from Codeigniter');
          // $this->email->message($message);
          // $this->email->set_newline("\r\n");
          // $this->email->send();
                
          // if($this->email->send())
          // {
          //   echo 'Email sent.';
          // }
          // else
          // {
          //   show_error($this->email->print_debugger());
          // }
        }
        else
        {
          $this->load->view('Admin/register');
        }
    }




}
?>