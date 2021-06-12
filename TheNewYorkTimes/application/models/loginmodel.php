<?Php

class loginmodel extends CI_model{

    public function isvalidate($username,$password)
    {
        $response = $this->db->where(['username'=>$username,'password'=>$password])
                             ->get('users');



        // echo "<pre>";
        // print_r($response);
        // echo "</pre>";
        // exit();

        // $this->db->where('username','passsword')
        //          ->where('$username','$password')
        //          ->from('users')
        //          ->get();

        if ($response->num_rows())
        {
            return $response->row()->id;
        }
        else
        {
            return false;
        }
    }

    public function articleList($limit,$offset)
    {
        $id = $this->session->userdata('id');

        // print_r($id);
        // exit();

       $responses = $this->db->select()
                        ->from('articles')
                        ->where(['user_id'=>$id])
                        ->limit($limit,$offset)
                        ->get();
                        return $responses->result();

                        // print_r($responses);
                        // exit;
    }

    public function num_rows()
    {
        $id = $this->session->userdata('id');
        $responses = $this->db->select()
                        ->from('articles')
                        ->where(['user_id'=>$id])
                        ->get();
                        return $responses->num_rows();
    }

    public function add_articles($array)
    {
        return $this->db->insert('articles',$array);
    }

    public function add_user($array)
    {
        // print_r($array);
        // exit;
        return $this->db->insert('users',$array);
    }

    public function del($id)
    {
        // print_r($id);
        // exit;
        return $this->db->delete('articles',['id'=>$id]);
    }

    public function find_article($articleid)
    {
        $recidonly = $this->db->select(['article_title','article_body','id']) 
                 ->where('id',$articleid)
                 ->get('articles');   
                  return $recidonly->row();
    }

    public function update_article($articleid,Array $articledetails)
    {
      return $this->db->where('id',$articleid)
                       ->update('articles',$articledetails);
    }











































    //Recieve array from table in different way.

    // public function add_articles($array)
    // {
    //     $a=$array['title'];
    //     $this->db->insert('articles',['article_title',$a]);
    // }



















}

?>