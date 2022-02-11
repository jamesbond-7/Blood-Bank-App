<?php

class Hospitals extends Controller{
    public function __construct(){
        $this->hospitalModel = $this->model('Hospital');
        $this->blood_infoModel = $this->model('BloodInfo');
        $this->blood_reqModel = $this->model('BloodRequest');
    }

    public function register(){

        if(isLoggedIn()){
            redirect('hospitals/index');
        }else{
            //Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process the form
                //die('submitted');
                //Sanitize the form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                
                $data =[
                'hname' => trim($_POST['hname']),
                'haddress' => trim($_POST['haddress']),
                'contact_no' => trim($_POST['contact_no']),
                'hemail'=>trim($_POST['hemail']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'agreement' => isset($_POST['agreement']) ? $_POST['agreement'] : '',
                'hname_err' => '',
                'haddress_err' => '',
                'contact_no_err' => '',
                'hemail_err' => '',
                'password_err' => '',
                'confirm_password_err' =>'',
                'agreement_err' => ''
            ];

                //Validate Hospital Name
                if(empty($data['hname'])){
                    $data['hname_err'] = 'Enter Hospital Name, Please..';
                    $this->view('hospitals/register',$data);
                }

                //Validate Hospital Address
                if(empty($data['haddress'])){
                    $data['haddress_err'] = 'Enter Hospital Address, Please..';
                    $this->view('hospitals/register',$data);
                }

                //Validate Contact Number
                if(empty($data['contact_no'])){
                    $data['contact_no_err'] = 'Enter Contact Number, Please..';
                    $this->view('hospitals/register',$data);
                }else{
                    if(strlen($data['contact_no']) < 10){
                        $data['contact_no_err'] = 'Sorry, Contact Number is Invalid..';
                        $this->view('hospitals/register',$data);
                    }
                }

                //Validate Email
                if(empty($data['hemail'])){
                    $data['hemail_err'] = 'Enter Hospital Email, Please..';
                    $this->view('hospitals/register',$data);
                }else{

                    if(!filter_var($data['hemail'], FILTER_VALIDATE_EMAIL)){
                        $data['hemail_err'] = 'Invalid Email Format..';
                        $this->view('hospitals/register',$data);
                    }

                    if($this->hospitalModel->findUserByEmail($data['hemail'])){
                    $data['hemail_err'] = 'Email Already Exists';
                    $this->view('hospitals/register',$data);
                    }
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                    $this->view('hospitals/register',$data);
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be atleast 6 characters';
                    $this->view('hospitals/register',$data);
                }

                //Validate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please Enter Confirm Password';
                    $this->view('hospitals/register',$data);
                }else{
                    if($data['password']!= $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                    $this->view('hospitals/register',$data);
                    }
                }
                
                //Validate Agreement
                if(empty($data['agreement'])){
                    $data['agreement_err'] = 'Please Accept Agreement';
                    $this->view('hospitals/register', $data);
                }

                //Make sure Errors are Empty
                $flag = true;

                foreach($data as $key=>$value){
                    if(!empty($data[$key.'_err'])){
                        $flag = false;
                        break;
                    }
                }

                if($flag){
                    //Validated
                    //die('SUCCESS');

                    //Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->hospitalModel->register($data)){
                        flash('register_success','Hurray! You are Registered & can LogIN');
                        redirect('hospitals/login');
                    }else{
                        die('Something Went Wrong...');
                    }
                }

            }else{
                //Init Data
            $data =[
                'hname' => '',
                'haddress' => '',
                'contact_no' => '',
                'hemail'=>'',
                'password' => '',
                'confirm_password' => '',
                'agreement' => isset($_POST['agreement']) ? $_POST['agreement'] : '',
                'hname_err' => '',
                'haddress_err' => '',
                'contact_no_err' => '',
                'hemail_err' => '',
                'password_err' => '',
                'confirm_password_err' =>'',
                'agreement_err' => ''
            ];

            // Load View
            $this->view('hospitals/register', $data);
            }
        }

        
    }
    public function login(){

        if(isLoggedIn()){
            redirect('hospitals/index');
        }else{
            //Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process the form
                //die('submitted');
            //Sanitize the form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $data =[
                'hemail' => trim($_POST['hemail']),
                'password' => trim($_POST['password']),
                'hemail_err' => '',
                'password_err' => ''
            ];
                //Validate Email
                if(empty($data['hemail'])){
                    $data['hemail_err'] = 'Please Enter Email';
                    $this->view('hospitals/login',$data);
                }else{
                    if(!filter_var($data['hemail'], FILTER_VALIDATE_EMAIL)){
                        $data['hemail_err'] = 'Invalid Email Format..';
                        $this->view('hospitals/login',$data);
                    }
                }

                //Check for user/email
                if($this->hospitalModel->findUserByEmail($data['hemail'])){
                    //User Found
                }else{
                    //User Not Found
                    $data['hemail_err'] = 'No user Found';
                    $this->view('hospitals/login',$data);
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                    $this->view('hospitals/login',$data);
                }
                
                
                //Make sure errors are empty
                if(empty($data['hemail_err']) && empty($data['password_err'])){
                    //Validated
                    //die('SUCCESS');
                    //Check and set logged in User
                    $loggedInUser = $this->hospitalModel->login($data['hemail'],$data['password']);
                    if($loggedInUser){
                        //Create Session
                        //die('SUCCESS');
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('hospitals/login', $data);
                    }
                }


            }else{
                //Init Data
                $data =[
                'hemail' => '',
                'password' => '',
                'hemail_err' => '',
                'password_err' => ''
            ];
            // Load View
            $this->view('hospitals/login', $data);
            }
        }
    
    }

    public function index(){

        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }


        $hospital = $this->hospitalModel->getUserInfo($_SESSION['user_id']);

        $bloodInfo = $this->blood_infoModel->getBloodInfo($_SESSION['user_id']);

        $show_response = $this->hospitalModel->showResponseStatus($_SESSION['user_id']);

        $data = [
            'hospital' => $hospital,
            'bloodInfo' => $bloodInfo,
            'show_response' => $show_response
        ];


        //Load View
        $this->view('hospitals/index', $data);
    }

    public function add_blood_info(){
        
        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize the form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //print_r($_POST);
            $data = [
                'hospital_id' => $_SESSION['user_id']
            ];

            $blood_group = [];
            $num_trans_bag = [];

            foreach($_POST as $key => $value){
                if(preg_match("/blood_group/",$key)){
                    $blood_group[$key] = $value;
                }
                if(preg_match('/num_trans_bag/',$key)){
                    $num_trans_bag[$key] = $value;
                }
            }

            $blood_group_keys = array_keys($blood_group);
            $num_trans_bag_keys = array_keys($num_trans_bag);

            $bloodModel = $this->blood_infoModel;

            for($i=0; $i<count($blood_group_keys); $i++){
                $data = [
                    'hospital_id' => $_SESSION['user_id'],
                    'blood_group' => $blood_group[$blood_group_keys[$i]],
                    'num_trans_bag' => $num_trans_bag[$num_trans_bag_keys[$i]]
                ];
                if($bloodModel->addBloodInfo($data)){
                    redirect('hospitals/index');
                }else{
                    die('Something Went Wrong');
                }
            }

        }

    //Load View
        $this->view('hospitals/add_blood_info');

    }

    public function view_requests_page(){
        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }

        $requests = $this->hospitalModel->getReceiverRequest($_SESSION['user_id']);

        $data = [
            'requests' => $requests
        ];

        //Load View
        $this->view('hospitals/view_requests_page',$data);
    }

    public function edit(){

        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }

        $hospital = $this->hospitalModel->getUserInfo($_SESSION['user_id']);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //die('submitted');
            //Sanitize the form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            #print_r($_POST);
            $newData =[
                'id' => $_SESSION['user_id'],
                'hname' => empty($_POST['hname']) ? $hospital->hname :trim($_POST['hname']),
                'haddress' =>  empty($_POST['haddress']) ? $hospital->haddress :trim($_POST['haddress']),
                'contact_no' =>  empty($_POST['contact_no']) ? $hospital->contact_no :trim($_POST['contact_no']) 
            ];

                $updated = $this->hospitalModel->updateHospital($newData);
                if($updated){
                    redirect('hospitals/index');
                }else{
                    die('Something Went Wrong...');
                }
        }else{
            $data = [
            'hospital' => $hospital
            ];
            //Load View
            $this->view('hospitals/edit', $data);
        }

        
    }

    public function edit_blood_info($bid){
        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }
        $bloodInfo = $this->blood_infoModel->getBloodInfoById($bid);
        //print_r($bloodInfo);
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //die('submitted');
            //Sanitize the form

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newData =[
                'hospital_id' => $_SESSION['user_id'],
                'id' => $bid,
                'blood_group' => empty($_POST['blood_group']) ? $bloodInfo->blood_group :trim($_POST['blood_group']),
                'num_trans_bag' =>  empty($_POST['num_trans_bag']) ? $bloodInfo->num_trans_bag :trim($_POST['num_trans_bag'])
            ];

            //print_r($newData);

                $updated = $this->blood_infoModel->updateBloodInfo($newData);
                //echo $bid;
                if($updated){
                    redirect('hospitals/index');
                }else{
                    die('Something Went Wrong...');
                }
         }else{
            $data = [
                'bloodInfo' => $bloodInfo
            ];
            //Load View
            $this->view('hospitals/edit_blood_info', $data);
          }
    }

    public function delete_blood_info($bid){
        if(!isLoggedIn()){
            redirect('hospitals/login');
        }else{
            if($_SESSION['type'] == 'receiver'){
                redirect('receivers/index');
            }
        }

        $delete = $this->blood_infoModel->deleteBloodInfo($bid);
        if($delete){
            redirect('hospitals/index');
        }else{
            die('Something Went Wrong..');
        }
    }

    public function response_request($rid,$bid){
        $data = [
            'hid' => $_SESSION['user_id'],
            'rid' => $rid,
            'bid' => $bid
        ];



        //die(print_r($data));
        $response = $this->blood_reqModel->responseRequest($data);
        if($response){
            redirect('hospitals/view_requests_page');
        }else{
            die('Something Went Wrong...');
        }


    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->hemail;
        $_SESSION['user_name'] = $user->hname;
        $_SESSION['type'] = 'hospital';
        redirect('hospitals/index');
        }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['type']);
        session_destroy();
        redirect('hospitals/login');
    }

   
}