<?php
//applicatioin/views/pics/search.php

$this->load->view($this->config->item('theme') . 'header');

?>

<h2><?php echo $title; ?></h2>

<?php 


echo '
<!--Script for search-->
<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 40%;
}
</style>
    
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">     
      <!--form for search-->
    <form method ="post" action="search">
  <input type="text" name="search" placeholder="Search Pics">
</form>
    <hr class="w3-border-grey" style="margin:auto;width:50%">';



$this->load->view($this->config->item('theme') . 'footer');

?>