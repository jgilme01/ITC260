<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url');
                $this->config->set_item('banner', 'News Banner');
        }

        public function index()
        {
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'News archive';

           // $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
           // $this->load->view('templates/footer', $data);
        }

       public function view($slug = NULL)
       {
            $data['news_item'] = $this->news_model->get_news($slug);

            if (empty($data['news_item']))
            {
                    show_404();
            }

            $data['title'] = $data['news_item']['title'];

            //$this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            //$this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {//show form
            //$this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            //$this->load->view('templates/footer', $data);

        }//end if
        else
        {//response for entering data
            $slug = $this->news_model->set_news();
            
            if($slug)
            {
             //$this->load->view('templates/header', $data);
            redirect('/news/view/' . $slug);
            //$data['title'] = 'Item Entered';
            feedback('News Item Created', 'notice');
            //$this->load->view('news/success', $data);
            //$this->load->view('templates/footer', $data);
            }//end if
            else
            {
                feedback('News Item not Created', 'warning');
                redirect('/news/create');
            }//end else
        }//end else
    }//end create()

}//end news controller

    