<?php
 
class User extends CI_Controller {
 
    public function __construct(){

        parent::__construct();
            $this->load->helper('form', 'url');
            $this->load->model('User_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->library('form_validation', 'database');
            $this->load->library('form_validation');
            $this->load->helper(array('form', 'url'));
    }    
    
    //Pogledi
    public function index(){
        
        $this->load->view('frontpageNova.php');
    }
    
    
    
    //register
    public function userRole_view(){
        
        $this->load->view('userRole.php');
    }

    public function bandRegistration_view(){
        
        $this->load->view('registerNov.php', array('error' => ' '));
    }
    
    public function registration_view(){
        
        $this->load->view('registrationPlace.php', array('error' => ' '));
    }
    
    public function register_user(){
        
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf"
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        
        $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>$this->input->post('user_password'),
            'user_picture'=>$_FILES['userfile']['name'],
            'user_role'=>$this->input->post('user_role'),
            'zanr1'=>$this->input->post('zanr1'),
            'zanr2'=>$this->input->post('zanr2')
        );
        
        $email_check=$this->User_model->email_check($user['user_email']);
        
        
        if($email_check){
            $this->User_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
            redirect('user/login_view');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured, Try again.');
            redirect('user');
        }
    }
    //---------------------------------------------------------------------------------
    
    
    //login
    public function login_view(){
        
        $data['error'] = "";
        $this->load->view("loginNov.php", $data);
    }
    
    public function login(){
        
        $mail = $this->input->post('email');
        $pass = $this->input->post('password');
        
        $que=$this->db->query("SELECT users.* FROM users WHERE user_email='{$mail}' AND user_password='{$pass}'");
        $row = $que->row();
        $iden = $row->id;
        
        $does_user_exist = $this->User_model->check_user($mail, $pass);
        
        if($does_user_exist){
            $data = array(
                'user_name' => $row->user_name,
                'id' => $row->id,
                'img' => $row->user_picture,
                'role_id' => $row->user_role
            );
            
            $query = $this->db->query("SELECT user_id FROM venues WHERE user_id = '{$iden}'");
            $userrole = $row->user_role;
            
            if($userrole == '2'){
                if($query->num_rows()>0){
                    $this->session->set_userdata($data);
                    redirect('user/home_view');
                } else {
                    $insert = $this->db->query("INSERT INTO venues(user_id) VALUES('{$iden}')");
                    $this->session->set_userdata($data);
                    redirect('user/home_view');
                }
            } else{
                $this->session->set_userdata($data);
                redirect('user/home_view');
            }
        } else {
            $data['error']="<h3 style='color:red'>E-pošta in geslo se ne ujemata</h3>";
            $this->load->view('loginNov.php', $data);
        }
    }
    
    public function user_logout(){
        
      $this->session->sess_destroy();
      redirect('user/index', 'refresh');
    }
    
    //-------------------------------------------------------------------------------------------------
    
    //homepage
    public function home_view(){
        
        $data['concerts'] = $this->User_model->get_future_concert_all();
        $data['bands'] = $this->User_model->getBands();
        $data['concerts'] = $this->User_model->get_future_concert_all();
        $data['venues'] = $this->User_model->get_venues();
        $data['bandName'] = "";
        $data['datum'] = "Choose";
        
        $this->load->view('home3.php', $data);
    }
    
    //--------------------------------------------------------------------------------------------------
    
    
    public function venueProfile($venue_id, $id){
        
        $data['venue'] = $this->User_model->get_venue($venue_id);
        $data['images'] = $this->User_model->get_venue_pictures($id);
        
        $this->load->view('venueProfile.php', $data);
    }
    
    
    
    
    
    
    
    
    public function dodajKoncert_view(){
        $data['bands']=$this->User_model->getBands();
        
        $this->load->view('dodajKoncert.php', $data);
    }
    
    public function mojiKoncerti_view(){
        date_default_timezone_set("America/New_York");
        $todayDate = date('Y-m-d');
        
        
        $data['bands'] = $this->User_model->getBands();
        $data['concerts'] = $this->User_model->get_all_user_concerts();
        $data['concertsForFilter'] = $this->User_model->get_all_user_concerts();
        $data['bandName'] = "";
        $data['datum'] = "Vsi koncerti";
        $data['danDatum'] = $todayDate;
        
        $this->load->view('mojiKoncerti.php', $data);
    }
    
    
    
    public function vecKoncertov_view(){
        $data['concerts'] = $this->User_model->get_future_concert_all();
        $data['bandName'] = "";
        $data['datum'] = "Vsi koncerti";
        $data['bands'] = $this->User_model->getBands();  
        $data['concertsForFilter'] = $this->User_model->get_future_concert_all();
        
        $this->load->view('vecKoncertov.php', $data);
    }
    
    public function vecIzvajalcev_view(){
        $data['bands'] = $this->User_model->getBands();
        $data['bandName'] = "";
        $data['datum'] = "Vsi koncerti";
        
        $this->load->view("vecIzvajalcev.php", $data);
    }
    
    public function zemljevid(){
        
        $data['bands'] = $this->User_model->getBands();
        $data['concerts'] = $this->User_model->get_future_concert_all();
        $data['venues'] = $this->User_model->get_venues();
        $data['bandName'] = "";
        $data['datum'] = "Vsi koncerti";
        $data['concertsForFilter'] = $this->User_model->get_future_concert_all();
        
        $this->load->view('zemljevid.php', $data);
    }
    
    
    
    
    
    
    
    
    
    //filtri
    public function filter(){
        
        $bandName = $this->input->post('bandFilter');
        $dateFilter = $this->input->post('datumFilter');
        $concertName = $this->input->post('concertName');
        $countryName = $this->input->post('drzavaName');
        $performerName = $this->input->post('performerName');
        $todayDate = date('Y-m-d');
        $datumFilter;
        
        //date
        if($dateFilter != ''){
            if($dateFilter == "Naslednji teden"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
            }
            else if($dateFilter == "Naslednji mesec"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
            }
            else if($dateFilter == "Naslednje leto"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")+1));
            }
        }

        if($dateFilter == "Vsi koncerti"){
            redirect('user/vecKoncertov_view');
        }
        else if($dateFilter != "Vsi koncerti" && $dateFilter != "Samo pretekli" && $dateFilter != ''){
            $data['concerts'] = $this->User_model->get_time_filtered_concerts_all($datumFilter);
        }
        else if($dateFilter == "Samo pretekli"){
            $data['concerts'] = $this->User_model->get_user_past_concerts();
        }
        
        
        if($performerName != ""){
            $data['concerts'] = $this->User_model->get_band_filtered_concerts_all($performerName);
        }
        
        //Event name
        if($concertName != ""){
            $data['concerts'] = $this->User_model->get_concert_by_name($concertName);
        }
        
        
        //Country name
        if($countryName != ""){
            $data['concerts'] = $this->User_model->get_concerts_by_country($countryName);
        }
        
        
        
        
        
        $data['bands'] = $this->User_model->getBands();  
        $data['concertsForFilter'] = $this->User_model->get_future_concert_all();
        $data['danDatum'] = $todayDate;
        $data['bands'] = $this->User_model->getBands();
        $data['bandName'] = $bandName;
        $data['datum'] = $dateFilter;
        $data['concertName'] = $concertName;
        
        
        $this->load->view('vecKoncertov.php', $data);
        
    }
    
    public function filterZemljevid(){
        
        $bandName = $this->input->post('bandFilter');
        $dateFilter = $this->input->post('datumFilter');
        $concertName = $this->input->post('concertName');
        $countryName = $this->input->post('drzavaName');
        $performerName = $this->input->post('performerName');
        $todayDate = date('Y-m-d');
        $datumFilter;
        
        //date
        if($dateFilter != ''){
            if($dateFilter == "Naslednji teden"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
            }
            else if($dateFilter == "Naslednji mesec"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
            }
            else if($dateFilter == "Naslednje leto"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")+1));
            }
        }

        if($dateFilter == "Vsi koncerti"){
            redirect('user/vecKoncertov_view');
        }
        else if($dateFilter != "Vsi koncerti" && $dateFilter != "Samo pretekli" && $dateFilter != ''){
            $data['concerts'] = $this->User_model->get_time_filtered_concerts_all($datumFilter);
        }
        else if($dateFilter == "Samo pretekli"){
            $data['concerts'] = $this->User_model->get_user_past_concerts();
        }
        
        
        if($performerName != ""){
            $data['concerts'] = $this->User_model->get_band_filtered_concerts_all($performerName);
        }
        
        //Event name
        if($concertName != ""){
            $data['concerts'] = $this->User_model->get_concert_by_name($concertName);
        }
        
        
        //Country name
        if($countryName != ""){
            $data['concerts'] = $this->User_model->get_concerts_by_country($countryName);
        }
        
        
        
        
        
        $data['bands'] = $this->User_model->getBands();  
        $data['concertsForFilter'] = $this->User_model->get_future_concert_all();
        $data['danDatum'] = $todayDate;
        $data['bands'] = $this->User_model->getBands();
        $data['bandName'] = $bandName;
        $data['datum'] = $dateFilter;
        $data['concertName'] = $concertName;
        
        
        
        /*
        //Tukaj loči kateri checkboxi so vključeni
        if((int)$concerts=='1' and (int)$venues=='1'){
            $data['data_for_markers'] = $this->User_model->get_concerts_and_venues();
        } else if((int)$concerts=='1' and (int)$venues=='0'){
            $data['data_for_markers'] = $this->User_model->get_future_concert_all();
        } else if((int)$concerts=='0' and (int)$venues=='1'){
            $data['data_for_markers'] = $this->User_model->get_venues();
        }
        */
        
        $this->load->view('zemljevid.php', $data);
    }
    
    public function myConcertsFilter(){
        $bandName = $this->input->post('bandFilter');
        $dateFilter = $this->input->post('datumFilter');
        $concertName = $this->input->post('concertName');
        $countryName = $this->input->post('drzavaName');
        $todayDate = date('Y-m-d');
        $datumFilter;
        
        
        //date
        if($dateFilter != ''){
            if($dateFilter == "Naslednji teden"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
            }
            else if($dateFilter == "Naslednji mesec"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
            }
            else if($dateFilter == "Naslednje leto"){
                $datumFilter= date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")+1));
            }
        }

        if($dateFilter == "Vsi koncerti"){
            redirect('user/mojiKoncerti_view');
        }
        else if($dateFilter != "Vsi koncerti" && $dateFilter != "Samo pretekli" && $dateFilter != ''){
            $data['concerts'] = $this->User_model->get_filtered_user_concerts($datumFilter);
        }
        else if($dateFilter == "Samo pretekli"){
            $data['concerts'] = $this->User_model->get_user_past_concerts();
        }
        
        
        //Event name
        if($concertName != ""){
            $data['concerts'] = $this->User_model->get_concert_by_name($concertName);
        }
        
        
        //Country name
        if($countryName != ""){
            $data['concerts'] = $this->User_model->get_concerts_by_country($countryName);
        }
        
        
        $data['concertsForFilter'] = $this->User_model->get_future_concert_all();
        $data['danDatum'] = $todayDate;
        $data['bands'] = $this->User_model->getBands();
        $data['bandName'] = $bandName;
        $data['datum'] = $dateFilter;
        $data['concertName'] = $concertName;
        
        $this->load->view('mojiKoncerti.php', $data);
    }
    
    
    
    
    
    
    
    
    

    
    //funkcije
    public function dodajNovKoncert(){
        $checked = $this->input->post('isVisible');
        if((int)$checked=='1'){
            $podatki=array(
                'name'=>$this->input->post('imeDogodka'),
                'date'=>$this->input->post('datumDogodka'),
                'time'=>$this->input->post('casDogodka'),
                'city'=>$this->input->post('krajDogodka'),
                'country'=>$this->input->post('drzavaDogodka'),
                'description'=>$this->input->post('opis'),
                'address'=>$this->input->post('hiddenAddress'),
                //'image'=>$_FILES['userfile']['name'],
                'visibility'=>'1',
                'user_id'=>$this->session->userdata('id'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'performer1'=>$this->input->post('izvajalec1'),
                'performer2'=>$this->input->post('izvajalec2'),
                'performer3'=>$this->input->post('izvajalec3'),
                'performer4'=>$this->input->post('izvajalec4'),
                'performer5'=>$this->input->post('izvajalec5')
            );   
        }
        else{
            $podatki=array(
                'name'=>$this->input->post('imeDogodka'),
                'date'=>$this->input->post('datumDogodka'),
                'time'=>$this->input->post('casDogodka'),
                'city'=>$this->input->post('krajDogodka'),
                'country'=>$this->input->post('drzavaDogodka'),
                'description'=>$this->input->post('opis'),
                'address'=>$this->input->post('hiddenAddress'),
                'image'=>$_FILES['userfile']['name'],
                'visibility'=>'0',
                'user_id'=>$this->session->userdata('id'),
                'lat'=>$this->input->post('lat'),
                'lng'=>$this->input->post('lng'),
                'performer1'=>$this->input->post('izvajalec1'),
                'performer2'=>$this->input->post('izvajalec2'),
                'performer3'=>$this->input->post('izvajalec3'),
                'performer4'=>$this->input->post('izvajalec4'),
                'performer5'=>$this->input->post('izvajalec5')
            ); 
        }

        $config = array(
            'upload_path' => "./uploads/eventImages/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf"
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        
        $this->User_model->add_concert($podatki);
        redirect('user/home_view');
    }
    
    public function izbrisiKoncert($id){
        
        $this->User_model->delete_row($id);
        redirect('user/mojiKoncerti_view');
    }
}

?>