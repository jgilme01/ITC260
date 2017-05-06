<?php
//application/controller/Pics.php
class Pics extends CI_Controller {
  
    
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Pics_model');
        }    

        public function index()
        {
            $this->config->load('flickr', true);
            $tags = array('bears', 'otters', 'cubs');
            $data['pics'] = $this->Pics_model->get_pics($tags);
            $data['title'] = 'Pics';

            $this->load->view('pics/index', $data);
        }

       public function view($slug = null)
       {
           $this->config->load('flickr', true);
            $data['pics'] = $this->Pics_model->get_pics(null, $slug);
           if (empty($data['pics']))
            {
                   // show_404(); 
            }
            $data['title'] = $slug;

            $this->load->view('pics/view', $data);
           }
            
    
    
    public function search(){
        $data['title'] = 'Search';
        $this->config->load('flickr', true);
        if(!$_POST){
        $this->load->view('pics/search', $data);
        }
        else
        {
        $tag = $_POST['search'];
        redirect('pics/view/' . $tag);
        
        }
    }


}//end pics controller