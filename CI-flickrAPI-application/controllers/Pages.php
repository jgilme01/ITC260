<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
{
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        //echo '<h5>' . $data['title'] . '/<h5>';
        //$this->load->view('templates/header', $data);
        $this->load->view($this->config->item('theme') . 'header');
        $this->load->view('pages/'.$page, $data);
        //$this->load->view('templates/footer', $data);
        $this->load->view('themes/bootswatch/footer', $data);
            //I added the explicit path, playing with the routing. Instead of:            
            //$this->load->view($this->config->item('theme') . 'header');
}
}