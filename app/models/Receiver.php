<?php 

class Receiver{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Register User
    public function register($data){
        $this->db->query('INSERT INTO receivers(name, phone_no, email, password, blood_group) VALUES(:name, :phone_no , :email, :password, :blood_group)');
        //Bind Values
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':phone_no',$data['phone_no']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':blood_group',$data['blood_group']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Login User
    public function login($email,$password){
        $this->db->query('SELECT * FROM receivers WHERE email = :email');
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function updateReceiver($data){
        $this->db->query('UPDATE receivers SET name = :name, phone_no = :phone_no, blood_group = :blood_group WHERE id = :id');
        //Bind Values
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':phone_no',$data['phone_no']);
        $this->db->bind(':blood_group',$data['blood_group']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Find user by Email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM receivers WHERE email = :email');
        $this->db->bind(':email',$email);

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
        $this->db->query('SELECT * FROM receivers WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

     //Get user by ID
     public function getUserById($id){
        $this->db->query('SELECT * FROM receivers WHERE id = :id');
        $this->db->bind(':id',$id);

        $row = $this->db->single();

        return $row;
    }
    
    //Show Request Status
    public function showRequestStatus($id){
        $this->db->query('SELECT * , receivers.id as rid , hospitals.id as hid , blood_info.id as bid, blood_info.blood_group as rbg FROM receivers INNER JOIN blood_request ON receivers.id = blood_request.receiver_id INNER JOIN hospitals ON hospitals.id = blood_request.hospital_id INNER JOIN blood_info ON blood_info.id = blood_request.blood_info_id WHERE receivers.id = :rid ORDER BY hospitals.hname ASC');
        $this->db->bind(':rid', $id);
        $results = $this->db->resultSet();
        return $results;
    }

}




?>