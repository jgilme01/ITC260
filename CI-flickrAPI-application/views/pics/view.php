<?php
//applicatioin/views/pics/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h3>' . $title . '</h3>';

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
    <form method ="post" action="../search">
  <input type="text" name="search" placeholder="Search Pics">
</form>
    <hr class="w3-border-grey" style="margin:auto;width:50%">';

foreach($pics as $pic){
//var_dump($pic);
    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';
    echo '<div style="display:inline-block">';
    echo "<img title='" . $pic->title . "' src='" . $photo_url . "'/>";
    if($pic->title!==""){
    echo '<br>' . $pic->title;}
    else{ echo '<br>Untitled';}
    echo '</div>';
    /*
    echo $pic->farm . 'farm';
    echo $pic->server . 'server';
    echo $pic->id . 'id';
    echo $pic->secret . 'secret';
    echo $photo_url . 'url';
    */
    
 
}



$this->load->view($this->config->item('theme') . 'footer');

?>