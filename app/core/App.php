<?php 

class App{
    private $controller = 'Home';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if(empty($url)){
            require_once '../app/controllers/'.$this->controller.'.php';
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else{

            // controller
            if(file_exists('../app/controllers/' . $url[0] . '.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
    
            require_once '../app/controllers/'.$this->controller.'.php';
            $this->controller = new $this->controller;
    
            //method
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
    
            //parameter
            if(!empty($url)){
                $this->params = array_values($url); 
            }
    
            //jalankan controller & method, serta kirimkan parameter
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
        
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/'); # hilangkan tanda backslash di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); # membersihkan url dari karakter" aneh
            $url = explode('/', $url); # pecah url ke dalam array
            return $url;
        }
    }

}