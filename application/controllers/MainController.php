<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MainModel','f');
    }
   public function index()
	{
           $this->load->view('view');
         
	}
   public function view($id=NULL){
    $row=$this->f->getImage($id);
    $data['r']=$row;
    $this->load->view('view_single',$data);
}

        
public function upload()
	{
            $this->load->helper('form');
		$this->load->view('upload');
         
	}
        
        public function save()
        {
            $url=$this->do_upload();
            $title=$_POST["title"];
            $this->MainModel->save($title, $url);
            redirect('MainController/index');
        }
 private function do_upload()
        {
            $type=explode('.',$_FILES["poza"]["name"]);
            $type=$type[count($type)-1];
            $url="./images/".uniqid(rand()).'.'.$type;
            if(in_array($type,array("jpg","jpeg","gif","png")))
                if(is_uploaded_file($_FILES["poza"]["tmp_name"]))
                    if(move_uploaded_file($_FILES["poza"]["tmp_name"], $url))
                        return $url;
            return "";
        }
public function delete($id){
    $id=$this->db->where('id',$id);
    $this->db->delete('images');
    //header('location:http://localhost/CodeIgniter2/index.php');
    redirect('MainController/index');
}

public function edit($id){
    $row=$this->f->getImage($id);
    $data['r']=$row;
    $this->load->view('edit_view',$data);
}
public function update(){
    $id=$this->input->post('id');
    //create array with input data
    $data=array(
        'title'=>$this->input->post('title'),
        'image'=>"./images/".$_FILES["poza"]["name"]
    );
    $title=$this->input->post('title');
    $image="./images/".$_FILES["poza"]["name"];
    
    move_uploaded_file($_FILES["poza"]["tmp_name"], $image);
    //update data
   
   // $this->f->update($title,$image,$id);
    $this->db->where('id',$id);
    $this->db->update('images',$data);
     redirect('MainController/index');
   //header('location:http://localhost/CodeIgniter2/index.php');
}
}

