<?php
class MainModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function save($title,$url)
    {
        $this->db->set('title',$title);
        $this->db->set('image',$url);
        $this->db->insert('images');
    }
   public function getImages(){
  $this->db->select('id,title,image')->from('images');
  $query = $this->db->get();
  return $query->result();
   }

   public function update($title,$image,$id){
        $this->db->set('title',$title);
        $this->db->set('image',$image);
        $this->db->where('id',$id);
    }
   function getImage($id){
  $this->db->where('id',$id);
  $query = $this->db->get('images');
  return $query->row();
} 


}
