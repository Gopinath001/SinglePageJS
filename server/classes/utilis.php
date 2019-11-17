<?php

class utilis{
    private $response = [];
    private $funName = '';
    private $args = [];

    public function addScript($jsScript){
        $this->response[]= ['js'=> $jsScript . ";"];
    }

    public function addCall($fn, $args){
        $this->response[] = ['call'=>[$fn,$args]];
    }

    public function addAssign($element,$method,$value){
        $this->response[] = ['assign'=>[$element => [$method=>$value]]];
    }


    public function getResponse(){
        return $this->response;
    }

    protected function  checkArguments($param){
        return (isset($_POST[$param]) &&  $_POST[$param] != '');
    }

}


?>