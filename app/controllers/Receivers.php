<?php

class Receivers extends Controller{
    public function __construct(){
        $this->receiverModel = $this->model('Receiver');
        $this->bloodRequestModel = $this->model('BloodRequest');
    }

    public function register(){
        if(isLoggedIn()){
            redirect('receivers/index');
        }else{

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process the form
                //die('submitted');
                //Sanitize the form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'phone_no' => trim($_POST['phone_no']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'blood_group' => trim($_POST['blood_group']),
                    'agreement' => isset($_POST['agreement']) ? $_POST['agreement'] : '',
                    'name_err' => '',
                    'phone_no_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'blood_group_err' => '',
                    'agreement_err' => ''
                ];

                //Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Enter Name, Please..';
                    $this->view('receivers/register',$data);
                }else{
                    if(!preg_match("/^[a-zA-Z ]*$/",$data['name'])){
                        $data['name_err'] = 'Only letters and White Space Allowed..';
                        $this->view('receivers/register', $data);
                    }
                }

                //Validate Phone Number
                if(empty($data['phone_no'])){
                    $data['phone_no_err'] = 'Enter Phone Number, Please..';
                    $this->view('receivers/register',$data);
                }else{
                    if(strlen($data['phone_no']) < 10){
                        $data['phone_no_err'] = 'Sorry, Phone Number is Invalid..';
                        $this->view('receivers/register',$data);
                    }
                }

                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Enter Email, Please..';
                    $this->view('receivers/register',$data);
                }else{

                    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                        $data['email_err'] = 'Invalid Email Format..';
                        $this->view('receivers/register',$data);
                    }

                    if($this->receiverModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email Already Exists';
                    $this->view('receivers/register',$data);
                    }
                }
                
                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Enter Password, Please..';
                    $this->view('receivers/register',$data);
                }else{
                    if(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be atleast 6 characters';
                    $this->view('receivers/register',$data);
                    }
                }

            
                
                //Validate Confirm Password
                
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Enter Confirm Password, Please..';
                    $this->view('receivers/register',$data);
                }else{
                    if($data['password'] !== $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                    $this->view('receivers/register',$data);
                    }
                }

                //Validate Blood Group

                if(empty($data['blood_group'])){
                    $data['blood_group_err'] = 'Enter Blood Group, Please..';
                    $this->view('receivers/register', $data);
                }

                //Validate Agreement
                if(empty($data['agreement'])){
                    $data['agreement_err'] = 'Please Accept Agreement';
                    $this->view('receivers/register', $data);
                }

                
                

                //print_r($data);

                
                //Make sure Errors are Empty
                $flag = true;

                foreach($data as $key=>$value){
                    if(!empty($data[$key.'_err'])){
                        $flag = false;
                        break;
                    }
                }

                //echo $flag;

                if($flag){
                    //Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->receiverModel->register($data)){
                        flash('register_success','You registered Successfully...');
                        redirect('receivers/login');
                    }else{
                        die('Something Went Wrong...');
                    }
                }else{
                    $this->view('receivers/register',$data);
                }
                
            }else{
                $data = [
                    'name' => '',
                    'phone_no' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'blood_group' => '',
                    'agreement' => '',
                    'name_err' => '',
                    'phone_no_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'blood_group_err' => '',
                    'agreement_err' => ''
                ];
                $this->view('receivers/register',$data);
            }
        }
}
    public function login(){

        if(isLoggedIn()){
            redirect('receivers/index');
        }else{
            //Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process the form
                //die('submitted');
                //Sanitize the form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init Data
                $data =[
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];
                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                    $this->view('receivers/login',$data);
                }else{
                    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                        $data['email_err'] = 'Invalid Email Format..';
                        $this->view('receivers/login',$data);
                    }
                }

                //Check for user/email
                if($this->receiverModel->findUserByEmail($data['email'])){
                    //User Found
                }else{
                    //User Not Found
                    $data['email_err'] = 'No user Found';
                    $this->view('receivers/login',$data);
                }

                //Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                    $this->view('receivers/login',$data);
                }
                
                
                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Validated
                    //die('SUCCESS');
                    //Check and set logged in User
                    $loggedInUser = $this->receiverModel->login($data['email'],$data['password']);
                    if($loggedInUser){
                        //Create Session
                        //die('SUCCESS');
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('receivers/login', $data);
                    }
                }else{
                    //Load View with errors
                    $this->view('receivers/login',$data);
                }


            }else{
                //Init Data
                $data =[
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            // Load View
            $this->view('receivers/login', $data);
            }
        }

        
    }


    public function index(){

        if(!isLoggedIn()){
            redirect('receivers/login');
        }else{
            if($_SESSION['type'] == 'hospital'){
                redirect('hospitals/index');
            }
        }


        $receiver = $this->receiverModel->getUserInfo($_SESSION['user_id']);

        $show_requests = $this->receiverModel->showRequestStatus($_SESSION['user_id']);

        $data = [
            'receiver' => $receiver,
            'show_requests' => $show_requests
        ];


        //Load View
        $this->view('receivers/index', $data);
    }

    public function edit(){

        if(!isLoggedIn()){
            redirect('receivers/login');
        }else{
            if($_SESSION['type'] == 'hospital'){
                redirect('hospitals/index');
            }
        }

        $receiver = $this->receiverModel->getUserInfo($_SESSION['user_id']);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //die('submitted');
            //Sanitize the form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            #print_r($_POST);
            $newData =[
                'id' => $_SESSION['user_id'],
                'name' => empty($_POST['name']) ? $receiver->name :trim($_POST['name']),
                'phone_no' =>  empty($_POST['phone_no']) ? $receiver->phone_no :trim($_POST['phone_no']),
                'blood_group' =>  empty($_POST['blood_group']) ? $receiver->blood_group :trim($_POST['blood_group']) 
            ];

                $updated = $this->receiverModel->updateReceiver($newData);
                if($updated){
                    redirect('receivers/index');
                }else{
                    die('Something Went Wrong...');
                }
        }else{
            $data = [
            'receiver' => $receiver
            ];
            //Load View
            $this->view('receivers/edit', $data);
        }

        


        
    } 
    
    public function request($hid,$bid){
        if(!isLoggedIn()){
            redirect('receivers/login');
        }else{
            if($_SESSION['type'] == 'hospital'){
                redirect('hospitals/index');
            }
        }
        $data = [
            'rid' => $_SESSION['user_id'],
            'hid' => $hid,
            'bid' => $bid
        ];
        $request = $this->bloodRequestModel->blood_request($data);
        // $checkedRequest = $this->bloodRequestModel->checkBloodRequest($data);
        if($request){
            // $this->view('pages/available_blood_samples',$checkedRequest);
            redirect('pages/available_blood_samples');
        }else{
            die('Something Went Wrong...');
        }

    }    

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['type'] = 'receiver';
        redirect('receivers/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['type']);
        session_destroy();
        redirect('receivers/login');
    }


   
}