<?php
//application/views/news/success.php

$this->load->view($this->config->item('theme') . 'header');

?>
    
    <h3>Yay, news.</h3>
        
    <p>Link to created</p>

<?php

$this->load->view($this->config->item('theme') . 'footer');
 
?>