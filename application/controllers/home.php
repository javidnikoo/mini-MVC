<?php

namespace Application\Controllers;

class Home extends Controller{

    public function index(){
        $productName = "phone";
        $this->view('app.index',compact('productName'));
    }

    public function create(){
        echo "this is a create method";
    }

    public function edit(){
        echo "this is a edit method";
    }


}
