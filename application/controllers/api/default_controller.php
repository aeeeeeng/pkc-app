<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class .... extends PKCC_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->is_GET();
        
    }

    public function store()
    {
        $this->is_POST();
        
    }

    public function edit($id)
    {
        $this->is_GET()();
        
    }

    public function update()
    {
        $this->is_PUT();
        
    }

    public function destroy()
    {
        $this->is_DELETE();
        
    }

}