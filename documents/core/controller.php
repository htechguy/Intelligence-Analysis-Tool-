<?php

class Controller
{
    protected $models;
    protected $view;
    
    public function __construct($controller, $action)
    {
        $this->view = new View();
        session_start();
    }
    
    // Load model class
    protected function load_model($model)
    {
        if (class_exists($model)) {
            $this->models[$model] = new $model();
        }
    }
    
    // Get the instance of the loaded model class
    protected function get_model($model)
    {
        if (is_object($this->models[$model])) {
            return $this->models[$model];
        } else {
            return false;
        }
    }
    
    protected function login_check()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . PATH . "account/login");
            exit();
        }
    }
    
    protected function redirect($to)
    {
        header("Location: " . PATH . $to);
    }
    
    protected function send_json($data = array())
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}