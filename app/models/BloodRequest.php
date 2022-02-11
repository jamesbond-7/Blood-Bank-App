<?php 

class BloodRequest{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function blood_request($data){
            $this->db->query('INSERT INTO blood_request(receiver_id, hospital_id, blood_info_id, request) VALUES(:receiver_id, :hospital_id, :blood_info_id, :request)');
            $this->db->bind(':receiver_id',$data['rid']);
            $this->db->bind(':hospital_id',$data['hid']);
            $this->db->bind(':blood_info_id',$data['bid']);
            $this->db->bind(':request','initiated');
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

    }

    public function checkBloodRequest($data){
        $this->db->query('SELECT request FROM blood_request WHERE receiver_id = :receiver_id && hospital_id = :hospital_id && blood_info_id = :blood_info_id');
        $this->db->bind(':receiver_id',$data['rid']);
        $this->db->bind(':hospital_id',$data['hid']);
        $this->db->bind(':blood_info_id',$data['bid']);
        $row = $this->db->single();
        $request = $row->request;
        return $request;
    }

    public function responseRequest($data){
        $this->db->query('UPDATE blood_request SET request = :request WHERE hospital_id = :hospital_id && receiver_id = :receiver_id && blood_info_id = :blood_info_id');
        $this->db->bind(':request', 'granted');
        $this->db->bind(':hospital_id', $data['hid']);
        $this->db->bind(':receiver_id', $data['rid']);
        $this->db->bind(':blood_info_id', $data['bid']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }


}



?>