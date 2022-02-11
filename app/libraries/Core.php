<?php

/*
* App Core Class
* Creates URL & Loads Core Controller
* URL Format - /controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'donate_blood_why';
    protected $params = [];

    public function __construct(){

        // print_r($this->getUrl());

        $url = $this->getUrl() ?? ["pages"];
        if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
            //if exists, set as controller
            $this->currentController = ucwords($url[0]);
            //Unset 0 Index
            unset($url[0]);
        }

        //Require the controller
        require_once '../app/controllers/'. $this->currentController . '.php';

        //Instantiate Controller Class
        $this->currentController = new $this->currentController;

        //Check for second part of the URL
        if(isset($url[1])){
            //Check to see if method exist in Controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                //Unset 1 index
                unset($url[1]);
            }
        }

        //echo $this->currentMethod;
        //Get Params
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod],$this->params);
    }

    public function getUrl(){
        //echo $_GET['url'];
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}
