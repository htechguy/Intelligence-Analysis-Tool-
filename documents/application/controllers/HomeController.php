<?php

class HomeController extends Controller
{
    public function __construct($controller, $action)
    {
        // Load core controller functions
        parent::__construct($controller, $action);
    }
    
    public function index()
    {
        $this->view->render('Home');
    }
}
