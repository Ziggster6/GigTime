<?php
 
class MyProfileController extends CI_Controller {
 
    public function __construct(){

        parent::__construct();
            $this->load->helper('form', 'url');
            $this->load->model('User_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->library('form_validation', 'database');
            $this->load->helper(array('form', 'url'));
    }
    
    //moj profil in nastavitve
    public function profile(){
        
        $id = $this->session->userdata('id');
        $role_id = $this->session->userdata('role_id');
        
        if($role_id == '1'){
            $data['user'] = $this->User_model->get_user_info($id);
            $data['images'] = $this->User_model->getImages($id);
            
            $this->load->view('myProfile.php', $data);
        }else{
            $que = $this->db->query("SELECT venue_id FROM venues JOIN users ON venues.user_id=users.id WHERE users.id = '{$id}'");
            $row = $que->row();
            $venue_id = $row->venue_id;
            
            $data['venue'] = $this->User_model->get_venue($venue_id);
            $data['images'] = $this->User_model->get_venue_pictures($id);
            
            $this->load->view('myProfileVenue.php', $data);
        }
    }
    
    //tuj profil
    public function bandProfile($ime = ""){
        
        $correctName = str_replace('.', ' ', $ime);
        $data['user'] = $this->User_model->getUser($correctName);
        
        $data['images'] = $this->User_model->getImagesForeign($correctName);
        
        $data['pastConcerts'] = $this->User_model->get_foreign_user_past_concerts($correctName);
        $data['concerts'] = $this->User_model->get_user_concert(FALSE, $correctName);
        
        $this->load->view('foreignProfile.php', $data);
    }
    
    
    
    public function dodajLinke(){
        $linki=array(
            'zanr1'=>$this->input->post('zanr1'),
            'zanr2'=>$this->input->post('zanr2'),
            'fb'=>$this->input->post('fb'),
            'yt'=>$this->input->post('yt'),
            'insta'=>$this->input->post('insta'),
            'website'=>$this->input->post('website'),
            'id'=>$this->session->userdata('id')
        );
        
        $this->User_model->links($linki);
        redirect('myProfileController/profile');
    }
    
    public function newPicture(){
        
        $this->User_model->deletePicture($this->session->userdata('img'));
        
        $user=array(
            'user_picture'=>$_FILES['userfile']['name'],
            'id'=>$this->session->userdata('id')
        );

        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf"
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        
        $this->User_model->changePicture($user);
        
        $this->session->set_userdata('img', $user['user_picture']);
        
        redirect('myProfileController/profile');
    }
    
    
    
    public function insert_story(){
        
        $vsebina = $this->input->post('zgodbaVsebina');
        
        $this->User_model->insert_story($vsebina);
        redirect('myProfileController/profile');
    }
    
    
    
    public function addNewPicture(){
        $user=array(
            'picture_filename'=>$_FILES['userfile']['name'],
            'id'=>$this->session->userdata('id'),
            'imgDesc'=>$this->input->post('opis'),
            'imgDate'=>$this->input->post('datum')
        );

        $config = array(
            'upload_path' => "./uploads/pictures",
            'allowed_types' => "gif|jpg|png|jpeg|pdf"
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        
        $this->User_model->addNewPicture($user);
        redirect('myProfileController/profile');
    }
    
    public function deleteImage(){
        $imageId = $this->input->post('imageId');
        $imageFile = $this->input->post('imageFile');
        
        $this->User_model->deleteImage($imageId, $imageFile);
        
        redirect('myProfileController/profile');
    }
    
    
    public function insert_contact(){
        $vsebina = $this->input->post('kontaktVsebina');
        
        $this->User_model->insert_contact($vsebina);
        redirect('myProfileController/profile');
    }
    
    
    
    
    
    public function changeVenueSettings(){
        
        $iden = $this->session->userdata('id');
        
        $que = $this->db->query("SELECT venue_id FROM venues JOIN users ON venues.user_id=users.id WHERE users.id = '{$iden}'");
        $row = $que->row();
        
        $data = array(
            'id' => $row->venue_id,
            'kapaciteta' => $this->input->post('kapaciteta'),
            'indoor' => $this->input->post('indoor'),
            'desc'=> $this->input->post('desc'),
            'contact' => $this->input->post('contact')
        );
            
        $this->User_model->changeVenueSettings($data);
        
        redirect('myProfileController/profile');
    }
    
    public function changeLocation_view(){
        
        $this->load->view('changeLocation.php');
    }
    
    
    public function changeLocation(){
        
        $id = $this->session->userdata('id');
        $lat = $this->input->post('hiddenLat');
        $lng = $this->input->post('hiddenLng');
        
        $this->User_model->changeLocation($lat, $lng, $id);
        
        redirect('myProfileController/profile');
    }
}

?>