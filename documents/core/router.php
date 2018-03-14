<?php
class Router
{
    public static function route($url)
    {
        // Split the URL into parts
        $url_array = explode("/", $url);
        
        // The first part of the URL is the controller name
        $controller = isset($url_array[0]) ? $url_array[0] : 'home';
        array_shift($url_array);

        // The second part is the method name
        $action = isset($url_array[0]) ? $url_array[0] : 'index';
        array_shift($url_array);

        // The third part are the parameters
        $params = $url_array;        

        $headers = getallheaders();
        if(isset($headers['Content-Type']) && $headers['Content-Type'] == 'application/json')
        {
            $requestBody = file_get_contents('php://input');
            array_push($params, json_decode($requestBody, true));
        }

        $controller_name = $controller;
        $controller = ucwords($controller) . 'Controller';
        $dispatch = new $controller($controller_name, $action);
     
        if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $params);
        }
    }
}
