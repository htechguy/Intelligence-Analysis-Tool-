<?php

class AccountController extends Controller
{
    public function __construct($controller, $action)
    {
        // Load core controller functions
        parent::__construct($controller, $action);
        
        // Load the model needed for this controller
        $this->load_model('User');
    }
    
    // Displays the login page
    public function login()
    {
        $this->view->render('Login');
    }

    // Handles login POST request
    public function loginpost($request = array())
    {
        $user = $this->get_model('User');
        $response = $user->login($request);
        $this->send_json($response);
    }

    // Displays the register page
    public function register()
    {
        $this->view->render('Register');
    }

    // Handles register POST request
    public function registerpost($request = array())
    {
        $user = $this->get_model('User');
        $response = $user->register($request);
        $this->send_json($response);
    }

    // Logs out the user
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user']);
        $this->redirect('account/login');
    }
}
