<?php

class Pics_model extends CI_Model { 
    
    public function __construct()
        {
               // $this->load->flickr();
    }
    
    
    
  public function get_pics(array $slugs = null, $slug = false)
        { 
      if($slugs){
        foreach($slugs as $slug){
        $pics[$slug]=json_decode(file_get_contents($this->get_url($slug, 4)));
                    }//end foreach
          return $pics;
      }
                        
      else{
          $pics = 
        json_decode(file_get_contents($this->get_url($slug)));
          return $pics->photos->photo;
      }
            //->tags->photos->photo; 
        }//end get_pics()    
    
    public function get_url($slug = false, $perPage = 12)
      { 
          $api_key = $this->config->item('api_key', 'flickr');
        //$perPage = 12;
          
          if ($slug === false)
          {
              //$tags = 'bears,otters,cubs';
              $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search' .  '&api_key=' . $api_key . '&tags=' . $tags . '&per_page=' . $perPage .  '&format=json' . '&nojsoncallback=1';
              
          }
        else
        {
          $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search' .  '&api_key=' . $api_key . '&tags=' . $slug . '&per_page=' . $perPage .  '&format=json' . '&nojsoncallback=1';
        }
          return $url;
      }//end get_url()
/*
public function search()
        {

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('sp17_news', $data);
            
        }//end set_pics()
        */
    
        }//end Pics_model