<?php

class User extends Model
{
    
    public function __construct()
    {
        // Load core model functions
        parent::__construct();
    }
    
    public function register($user = array())
    {
        $response = array();
        
        $username = $this->db->real_escape_string(strip_tags(isset($user['username']) ? $user['username'] : ''));
        $name = $this->db->real_escape_string(strip_tags(isset($user['name']) ? $user['name'] : ''));
        $phone_number = $this->db->real_escape_string(strip_tags(isset($user['phoneNumber']) ? $user['phoneNumber'] : ''));
        $email = $this->db->real_escape_string(strip_tags(isset($user['email']) ? $user['email'] : ''));
        $password = $this->db->real_escape_string(strip_tags(isset($user['password']) ? password_hash($user['password'], PASSWORD_DEFAULT) : ''));
        
        $username_count_query = $this->db->query("SELECT username FROM users WHERE username='$username'");
        $username_count = $username_count_query->num_rows;
        
        if ($username_count == 0) {
            $insert_query = $this->db->query("INSERT INTO users (username, name, phone_number, email, password) VALUES ('$username', '$name', '$phone_number', '$email', '$password')");
            
            $user["id"] = $this->db->insert_id;
            $response["status"] = "success";
            $response["message"] = "User created successfully";
            $response["createdUser"] = $user;
            $_SESSION["user"] = $user;
        } else {
            $response["status"] = "error";
            $response["message"] = "Username already exists";
        }
        $this->db->close();
        return $response;
    }
    
    public function login($user = array())
    {
        $response = array();
        
        $username = $this->db->real_escape_string(strip_tags(isset($user['username']) ? $user['username'] : ''));
        $password = $this->db->real_escape_string(strip_tags(isset($user['password']) ? $user['password'] : ''));
        
        $username_count_query = $this->db->query("SELECT username, password FROM users WHERE username='$username'");
        $username_count = $username_count_query->num_rows;
        $row = $username_count_query->fetch_array();
        
        if ($username_count == 1 && password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row;
            $response["status"] = "success";
            $response["message"] = "Login successful";
        } else {
            $response["status"] = "error";
            $response["message"] = "Invalid login";
        }
        $this->db->close();
        return $response;
    }
}