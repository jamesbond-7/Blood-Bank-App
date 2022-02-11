<?php

class Pages extends Controller{
    public function __construct(){
        $this->hospitalModel = $this->model('Hospital');
        //$this->bloodRequestModel = $this->model('BloodRequest');
    }
    


    public function donate_blood_why(){
        $this->view('pages/donate_blood_why');
    }
    public function need_blood_who(){
        $this->view('pages/need_blood_who');
    }

    public function available_blood_samples(){

      
        $hospitalsDetail = $this->hospitalModel->getHospitalsDetail();
        // $request = //$this->bloodRequestModel->checkBloodRequest();
        $data = [
            'hospitalsDetail' => $hospitalsDetail,
            //'request' => $request
        ];
        $this->view('pages/available_blood_samples', $data);
    }
}