<?php

class Document extends Model
{
    
    public function __construct()
    {
        // Load core model functions
        parent::__construct();
    }
    
    public function get_all()
    {
        $documents_query = $this->db->query("SELECT * FROM documents ORDER BY name ASC");
        $results = array();
        while ($doc = $documents_query->fetch_assoc()) {
            $results[] = $doc;
        }
        $this->db->close();
        return $results;
    }
    
    public function getbyid($id = '')
    {
        
        $id_cleaned = $this->db->real_escape_string(strip_tags($id));
        $documents_query = $this->db->query("SELECT * FROM documents WHERE id='$id_cleaned'");
        $doc = $documents_query->fetch_assoc();
        return $doc;
    }
    
    public function create($request)
    {
        
        $response = array();
        
        $name = $this->db->real_escape_string(strip_tags(isset($request['name']) ? $request['name'] : ''));
        $content = $this->db->real_escape_string(strip_tags(isset($request['content']) ? $request['content'] : ''));
        $created_on = date("Y-m-d H:i:s");
        
        $insert_query = $this->db->query("INSERT INTO documents (name, content, created_on) VALUES ('$name', '$content', '$created_on')");
        
        $response["status"] = "success";
        $response["message"] = "Document uploaded successfully";
        
        return $response;
    }
    
    public function update($request)
    {
        
        $response = array();
        
        $id = $this->db->real_escape_string(strip_tags(isset($request['id']) ? $request['id'] : ''));
        $content = $this->db->real_escape_string(strip_tags(isset($request['content']) ? $request['content'] : ''));
        $updated_on = date("Y-m-d H:i:s");
        
        $insert_query = $this->db->query("UPDATE documents SET content='$content', updated_on='$updated_on' WHERE id = '$id'");
        
        $response["status"] = "success";
        $response["message"] = "Document updated successfully";
        
        return $response;
    }
    
    public function delete($request)
    {
        
        $response = array();
        
        $id = $this->db->real_escape_string(strip_tags(isset($request['id']) ? $request['id'] : ''));
        
        $insert_query = $this->db->query("DELETE FROM documents WHERE id = '$id'");
        
        $response["status"] = "success";
        $response["message"] = "Document updated successfully";
        
        return $response;
    }
}