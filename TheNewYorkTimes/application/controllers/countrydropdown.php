<?php

class countrydropdown extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('country_dropdown_model');
    }

    function index()
    {
        $data['country']  = $this->country_dropdown_model->fetch_country();
        $this->load->view('users/country_dropdown',$data);
    }

    function fetch_state()
    {  
        if($this->input->post('country_id'))
        {
            echo $this->country_dropdown_model->fetch_state($this->input->post('country_id'));

        }
    }

    function fetch_city()
    {
        if($this->input->post('state_id'))
        {
            echo $this->country_dropdown_model->fetch_city($this->input->post('state_id'));            
        }
    }

}




























?>