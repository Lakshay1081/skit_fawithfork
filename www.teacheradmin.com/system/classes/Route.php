<?php 
 class Route extends Framwork{
    protected $controller = "signin";
    protected $method = "index";
    protected $params = []; 
    // ob_start();
    public function __construct() {
        $url  = $this->url();

        if(!empty($url)) {
            if(file_exists("../app/controllers/". $url[0]. ".php")) {
                $this->controller = $url[0];
                //$this->redirect('dashboard');
                unset($url[0]);
            }
            else {
               echo "Sorry ".$url[0]. " Controllers Not Found";
                $this->redirect($_GET[$url[0]]);
               
            }
        }
        //include controller
        include_once("../app/controllers/" .$this->controller. ".php");
        //initset controllers
        $this->controller = new $this->controller;

        // Method Include
        if(isset($url[1]) && !empty($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
               unset($url[1]);
            }
            else {
                echo "Sorry ".$url[1]. " Method Not Found";
                // $this->redirect($_GET[$url[1]]);
            }
        }

        // params
        if(isset($url)) {
            $this->params  = $url;
        }else {
            $this->params  = [];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function url() {
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }

 }