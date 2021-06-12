<?php
class admin extends MY_controller
{
    public function welcome()
    {
       $this->load->model('loginmodel');
    //    $articles = $this->loginmodel->articleList();
    //    $this->load->view('admin/dashboard',['articles'=>$articles]);
    
        $this->load->library('pagination');

        $config = [
            'base_url' => base_url('admin/welcome'),
            'per_page'=> 3,
            'total_rows'=>$this->loginmodel->num_rows(),
            'full_tag_open'=>"<ul class='pagination'>",
            'full_tag_close'=>"</ul>",
            'next_tag_open' =>"<li>",
            'next_tag_close' =>"</li>",
            'prev_tag_open' =>"<li>",
            'prev_tag_close' =>"</li>",
            'num_tag_open' =>"<li>",
            'num_tag_close' =>"<li>",
            'cur_tag_open' =>"<li class='active'>",
            'cur_tag_close' =>"</li>"
        ];

        $this->pagination->initialize($config);

        $articles = $this->loginmodel->articleList($config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/dashboard',['articles'=>$articles]);
    
    }

    public function userValidation()
    {
        if($this->form_validation->run('add_article_rules'))
        {
            $post = $this->input->post();
            $this->load->model('loginmodel','useradd');
            if($this->useradd->add_articles($post))
            {
                $this->session->set_flashdata('msg','Articles added successfully');
                $this->session->set_flashdata('msg_class','alert-success');
                
            }
            else
            {
                $this->session->set_flashdata('msg','Articles not added,Please try again!!!');
                $this->session->set_flashdata('msg_class','alert-danger');

            }
            return redirect('admin/welcome');
        }
        else
        {
            $this->load->view('admin/add_article');
        }
    }

    public function edituser($id)
    {
        $this->load->model('loginmodel');
      $fetcharticledet = $this->loginmodel->find_article($id);
                // echo "<pre>";     
                // print_r($fetcharticledet);
                // echo "</pre>";     
                // exit;    
        $this->load->view('admin/edit_article',['article' => $fetcharticledet]);
    }

    public function updatearticle($article_id)
    {
        if($this->form_validation->run('add_article_rules'))
        {
            $post = $this->input->post();
            // $articleid = $post['article_id'];
            // unset($articleid);
            $this->load->model('loginmodel','editupdate');
            if($this->editupdate->update_article($article_id,$post))
            {
                $this->session->set_flashdata('msg','Article Updated Successfully');
                $this->session->set_flashdata('msg_class','alert-success');
                
            }
            else
            {
                $this->session->set_flashdata('msg','Article not Updated,Please try again!!!');
                $this->session->set_flashdata('msg_class','alert-danger');

            }
            return redirect('admin/welcome');
        }
        else
        {
            $this->load->view('admin/edituser');
        }



    }


    public function delarticles()
    {
            $id=$this->input->post('id');
        
            $this->load->model('loginmodel','delarticle');
            if($this->delarticle->del($id))
            {
                $this->session->set_flashdata('msg','Deleted Successfully');
                $this->session->set_flashdata('msg_class','alert-success');
            }
            else
            {
                $this->session->set_flashdata('msg','Please try again..not delete');
                $this->session->set_flashdata('msg_class','alert-danger');
            }
            return redirect('admin/welcome');

    }



    public function adduser()
    {
        $this->load->view('admin/add_article');
    }

    public function register()
    {
        $this->load->view('admin/register');
    }

    

    public function  __construct()
    {
        parent::__construct();
        if( ! $this->session->userdata('id')){
            // return redirect('welcome');
        }
      
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
         return redirect('login'); 
    }

    






}
?>