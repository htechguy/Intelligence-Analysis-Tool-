<?php
// Load configuration and helper functions
require_once(ROOT . DS . 'core' . DS . 'router.php');
require_once(ROOT . DS . 'core' . DS . 'controller.php');
require_once(ROOT . DS . 'core' . DS . 'model.php');
require_once(ROOT . DS . 'core' . DS . 'view.php');

// Autoload classes
function __autoload($className)
{
    if (file_exists(ROOT . DS . 'core' . DS . strtolower($className) . '.php')) {

        require_once(ROOT . DS . 'core' . DS . strtolower($className) . '.php');
    } elseif (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {

        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } elseif (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php')) {

        require_once(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php');
    }
    elseif(require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php')){

      require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php');
    }
}

// Route the request
Router::route($url);
