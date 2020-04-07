<?php
class User_model extends CI_model{
    
    public function __construct(){
        
        $this->load->database();
    }
    
    public function register_user($user){
        
        $this->db->insert('users', $user);
    }
    
    public function check_user($mail, $pass){
        
        $query = $this->db->query("SELECT users.* FROM users WHERE user_email = '{$mail}' AND user_password = '{$pass}'");
        
        if($query->num_rows()>0){
            return true;
        } else {
            return false;
        }
    }
    
    public function email_check($email){
        
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '{$email}'");

        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
    
    public function add_concert($podatki){
        
        $this->db->insert('concerts', $podatki);
    }
    
    public function get_user_info($user){
        
        $query = $this->db->query("SELECT users.* FROM users WHERE users.id = '{$user}'");
        return $query->result_array();
    }
    
    
    public function get_venues(){
        
        $query = $this->db->query("SELECT users.*, venues.* FROM users JOIN venues ON users.id = venues.user_id WHERE users.user_role = '2'");
        return $query->result_array();
    }
    
    public function changeLocation($lat, $lng, $id){
        
        $query = $this->db->query("UPDATE venues SET lat = '{$lat}', lng = '{$lng}' WHERE user_id = {$id}");
    }
    
    
    
    
    
    public function get_all_user_concerts(){
        
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');
        
        $user = $this->session->userdata('user_name');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' ORDER BY concerts.date DESC");
        return $query->result_array();
    }
    
    public function get_user_past_concerts(){
        
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');
        
        $user = $this->session->userdata('user_name');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' AND concerts.date<'{$date}'");
        return $query->result_array();
    }
    
    public function get_foreign_user_past_concerts($user){
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');
        
        
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' AND concerts.date<='{$date}'");
        return $query->result_array();
    }
    
    public function get_filtered_user_concerts($dateFilter){
     
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');
        
        $user = $this->session->userdata('user_name');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' AND concerts.date<='{$dateFilter}' AND concerts.date>'{$date}'");
        return $query->result_array();
    }
    
    public function get_concert_by_name($concertName){
        
        $user = $this->session->userdata('user_name');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' AND concerts.name = '{$concertName}'");
        return $query->result_array();
    }
    
    public function get_concerts_by_country($countryName){
        $user = $this->session->userdata('user_name');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE users.user_name = '{$user}' AND concerts.country = '{$countryName}'");
        return $query->result_array();
    }
    
    
    
    
    public function get_future_concert($slug = FALSE){
        
        if ($slug === FALSE){
            date_default_timezone_set("America/New_York");
            $date = date('Y-m-d');
            
            $query = $this->db->query("SELECT * FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE concerts.date>='{$date}' AND user_id =".$this->session->userdata('id')." ORDER BY concerts.date");
            return $query->result_array();
        }

        $query = $this->db->get_where('concerts', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function get_future_concert_all($slug = FALSE){
        
        if ($slug === FALSE){
            date_default_timezone_set("America/New_York");
            $date = date('Y-m-d');
            
            $query = $this->db->query("SELECT * FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE concerts.date>='{$date}' ORDER BY concerts.date");
            return $query->result_array();
        }

        $query = $this->db->get_where('concerts', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function get_time_filtered_concerts_all($timeFilter){
        
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');

        $query = $this->db->query("SELECT *, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE concerts.date>='{$date}' AND concerts.date<='{$timeFilter}' ORDER BY concerts.date");
        
        return $query->result_array();
    }
    
    public function get_band_filtered_concerts_all($bandName){
        
        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d');
        
        $query = $this->db->query("SELECT concerts.*, users.user_name FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE concerts.date>='{$date}' AND users.user_name = '{$bandName}'");
        return $query->result_array();
    }
    
    public function get_user_concert($slug = FALSE, $id){
        
        if ($slug === FALSE){
            date_default_timezone_set("America/New_York");
            $date = date('Y-m-d');
            
            $query = $this->db->query("SELECT * FROM concerts INNER JOIN users ON concerts.user_id=users.id WHERE concerts.date>='{$date}' AND user_name = '".$id."' ORDER BY concerts.date");
            return $query->result_array();
        }

        $query = $this->db->get_where('concerts', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function delete_row($id){
        
        $query = $this->db->query("DELETE FROM concerts WHERE concert_id={$id}");
    }   
    
    
    //Tukaj dobimo vse različne vrste uporabnikov v seznam
    public function getBands(){
        
        $query = $this->db->query("SELECT * FROM users WHERE user_role = '1'");
        return $query->result_array();
    }

    
    //Profile links
    public function links($linki){
        
        $fb = $linki['fb'];
        $yt = $linki['yt'];
        $insta = $linki['insta'];
        $website = $linki['website'];
        $zanr1 = $linki['zanr1'];
        $zanr2 = $linki['zanr2'];
        $id = $linki['id'];
        
        $query = $this->db->query("UPDATE users SET fb = '{$fb}', yt = '{$yt}', insta = '{$insta}', website = '{$website}', zanr1 = '{$zanr1}', zanr2 = '{$zanr2}' WHERE id='{$id}'");
    }
    
    
    //Profile picture
    public function changePicture($user){
        
        $slika = $user['user_picture'];
        $id = $user['id'];
        
        $query = $this->db->query("UPDATE users SET user_picture = '{$slika}' WHERE id = '{$id}'");
    }
    
    public function deletePicture($zdajSlika){
        
        unlink("uploads/".$zdajSlika);
    }

    
    
    //Slike
    public function addNewPicture($user){
        $slika = $user['picture_filename'];
        $id = $user['id'];
        $opis = $user['imgDesc'];
        $datum = $user['imgDate'];
        
        $query = $this->db->query("INSERT INTO pictures(user_id, picture_filename, imgDesc, imgDate) VALUES('{$id}', '{$slika}', '{$opis}', '{$datum}')");       
    }
    
    public function getImages($id){
        $query = $this->db->query("SELECT * FROM pictures WHERE user_id='{$id}'");
        
        return $query->result_array();
    }
    
    public function getImagesForeign($name){
        $query = $this->db->query("SELECT * FROM pictures WHERE user_id IN(SELECT id FROM users WHERE user_name='{$name}')");
        
        return $query->result_array();
    }
    
    public function deleteImage($imageId, $imageFile){
        $query = $this->db->query("DELETE FROM pictures WHERE picture_id='{$imageId}'");
        
        unlink("uploads/pictures/".$imageFile);
    }
    
    
    //Foreign profile
    public function getUser($id){
        
        $query = $this->db->query("SELECT * FROM users WHERE user_name='{$id}'");
        
        return $query->result_array();
    }
    
    
    
    //my profile inserts
    public function insert_story($story){
        
        $user = $this->session->userdata('id');
        
        $query = $this->db->query("UPDATE users SET description = '{$story}' WHERE id='{$user}'");
    }
    
    public function insert_contact($contact){
        
        $user = $this->session->userdata('id');
        
        $query = $this->db->query("UPDATE users SET contact = '{$contact}' WHERE id='{$user}'");
    }
    
    
    //venue profile
    public function get_venue($id){
        
        $query = $this->db->query("SELECT users.*, venues.* FROM users JOIN venues ON users.id=venues.user_id WHERE venues.venue_id='{$id}'");
        
        return $query->result_array();
    }
    
    public function get_venue_pictures($id){
        
        $query = $this->db->query("SELECT * FROM pictures WHERE user_id = '{$id}'");
        
        return $query->result_array();
    }
    
    public function changeVenueSettings($data){
        
        $id = $data['id'];
        $capacity = $data['kapaciteta'];
        $indoor = $data['indoor'];
        $desc = $data['desc'];
        $contact = $data['contact'];
        
        $query = $this->db->query("UPDATE venues SET size = {$capacity}, indoor = {$indoor}, description = '{$desc}', contactVenue = '{$contact}' WHERE venue_id = {$id}");
    }
    
}

?>