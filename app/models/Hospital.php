<?php 

class Hospital{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Register User
    public function register($data){
        $this->db->query('INSERT INTO hospitals(hname, contact_no, hemail, haddress, password) VALUES(:hname, :contact_no , :hemail, :haddress, :password)');
        //Bind Values
        $this->db->bind(':hname',$data['hname']);
        $this->db->bind(':contact_no',$data['contact_no']);
        $this->db->bind(':hemail',$data['hemail']);
        $this->db->bind(':haddress',$data['haddress']);
        $this->db->bind(':password',$data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Login User
    public function login($email,$password){
        $this->db->query('SELECT * FROM hospitals WHERE hemail = :hemail');
        $this->db->bind(':hemail',$email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        
        if(password_verify($password,$hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function updateHospital($data){
        $this->db->query('UPDATE hospitals SET hname = :hname, contact_no = :contact_no, haddress = :haddress WHERE id = :id');
        //Bind Values
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':hname',$data['hname']);
        $this->db->bind(':contact_no',$data['contact_no']);
        $this->db->bind(':haddress',$data['haddress']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



    //Find user by Email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM hospitals WHERE hemail = :hemail');
        $this->db->bind(':hemail',$email);

        $row = $this->db->single();

        //Check Row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //Get user data
    public function getUserInfo($id){
        $this->db->query('SELECT * FROM hospitals WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

     //Get user by ID
     public function getUserById($id){
        $this->db->query('SELECT * FROM hospitals WHERE id = :id');
        $this->db->bind(':id',$id);

        $row = $this->db->single();

        return $row;
    }

    public function getHospitalsDetail(){
        $this->db->query('SELECT  * , hospitals.id as hid , blood_info.id as bid FROM hospitals INNER JOIN blood_info ON hospitals.id = blood_info.hospital_id ORDER BY hospitals.hname ASC ');
        $results = $this->db->resultSet();
        return $results;
        
    }

 

    public function getReceiverRequest($hid){
        $this->db->query('SELECT  * , receivers.id as rid , blood_request.id as brid ,hospitals.id as hid,receivers.blood_group as receiver_blood_group, blood_info.blood_group as requested_blood_group FROM receivers INNER JOIN blood_request ON receivers.id = blood_request.receiver_id INNER JOIN hospitals ON hospitals.id = blood_request.hospital_id INNER JOIN blood_info ON blood_info.id = blood_request.blood_info_id WHERE blood_request.request="initiated" && hospitals.id=:hid ORDER BY receivers.name ASC');
        $this->db->bind(':hid',$hid);
        $results = $this->db->resultSet();
        return $results;       
    }

        public function showResponseStatus($id){
        $this->db->query('SELECT * , receivers.id as rid , hospitals.id as hid , blood_info.id as bid, blood_info.blood_group as rbg, receivers.blood_group as bg FROM hospitals INNER JOIN blood_request ON hospitals.id = blood_request.hospital_id INNER JOIN receivers ON receivers.id = blood_request.receiver_id INNER JOIN blood_info ON blood_info.id = blood_request.blood_info_id WHERE hospitals.id = :hid ORDER BY receivers.name ASC');
        $this->db->bind(':hid', $id);
        $results = $this->db->resultSet();
        return $results;
    }

}

?>