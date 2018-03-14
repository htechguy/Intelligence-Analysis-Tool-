<?php

class DocumentController extends Controller
{

    public function __construct($controller, $action)
    {
        // Load core controller functions
        parent::__construct($controller, $action);
        // Load models
        $this->load_model('Document');
    }

    public function list()
    {
        $document = $this->get_model('Document');
        $documents = $document->get_all();
        $this->view->set("documents", $documents);
        $this->view->render('DocumentList');
    }

    public function detail()
    {
        $document = $this->get_model('Document');
        $documents = $document->get_all();
        $this->view->set("documents", $documents);
        $this->view->render('DocumentDetail');
    }

    public function add()
    {
        $this->login_check();
        $this->view->render('DocumentAdd');
    }

    public function graph()
    {
        $this->login_check();
        $document = $this->get_model('Document');
        $documents = $document->get_all();
        $this->view->set("documents", $documents);
        $this->view->render('DocumentGraph');
    }

    public function addpost($request = array())
    {
        $document = $this->get_model('Document');
        $response = $document->create($request);
        $this->send_json($response);
    }

    public function edit()
    {
        $this->login_check();
        $document = $this->get_model('Document');
        $documents = $document->get_all();
        $this->view->set("documents", $documents);
        $this->view->render('DocumentEdit');
    }

    public function editpost($request = array())
    {
        $document = $this->get_model('Document');
        $response = $document->update($request);
        $this->send_json($response);
    }

    public function delete()
    {
        $this->login_check();
        $document = $this->get_model('Document');
        $documents = $document->get_all();
        $this->view->set("documents", $documents);
        $this->view->render('DocumentDelete');
    }

    public function deletepost($request = array())
    {
        $document = $this->get_model('Document');
        $response = $document->delete($request);
        $this->send_json($response);
    }

    public function getbyid($id='')
    {
        $document = $this->get_model('Document');
        $response = $document->getbyid($id);
        $this->send_json($response);
    }
}
