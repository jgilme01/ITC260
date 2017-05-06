<?php
//application/views/pics/index.php

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
    <form method ="post" action="pics/search">
  <input type="text" name="search" placeholder="Search Pics">
</form>
    <hr class="w3-border-grey" style="margin:auto;width:50%">';

foreach($pics as $pic=>$value){
echo '<h3>' . $pic . ' <a href="pics/view/' . $pic .'">Click for more!</a></h3>';

    
foreach($value->photos->photo as $pic){

    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

    echo '<div style="display:inline-block">';
    echo "<img title='" . $pic->title . "' src='" . $photo_url . "'/>";
    echo '<p>' . $pic->title . '</p>';
    echo '</div>';
}
}

$this->load->view($this->config->item('theme') . 'footer');

?>