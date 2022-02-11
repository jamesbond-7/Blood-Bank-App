<?php 

class BloodInfo{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addBloodInfo($data){
        $this->db->query('INSERT INTO blood_info(hospital_id,blood_group,num_trans_bag) VALUES(:hospital_id,:blood_group,:num_trans_bag)');
        $this->db->bind(':hospital_id',$data['hospital_id']);
        $this->db->bind(':blood_group',$data['blood_group']);
        $this->db->bind(':num_trans_bag',$data['num_trans_bag']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getBloodInfo($id){
        $this->db->query('SELECT * FROM blood_info WHERE hospital_id=:hospital_id');
        $this->db->bind(':hospital_id',$id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getBloodInfoById($id){
        $this->db->query('SELECT * FROM blood_info WHERE id=:id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();
        return $row;        
    }

    public function updateBloodInfo($data){
        $this->db->query('UPDATE blood_info SET blood_group = :blood_group, num_trans_bag = :num_trans_bag WHERE id=:id');
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':blood_group',$data['blood_group']);
        $this->db->bind(':num_trans_bag',$data['num_trans_bag']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteBloodInfo($id){
        $this->db->query('DELETE FROM blood_info WHERE id = :id');
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }





}



?>