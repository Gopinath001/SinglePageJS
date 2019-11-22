<?php

abstract class utilis{
    private $response = [];
    private $funName = '';
    private $args = [];

    public function addScript($jsScript){
        $jsScript = $jsScript . ";";
        $jsonEncode = json_encode($jsScript,JSON_UNESCAPED_SLASHES|
            JSON_UNESCAPED_UNICODE);
        /* add sha1 hash of the script to verify the integrity of script */
        $this->response[]= ['js'=> $jsScript,'verify'=> sha1($jsonEncode)];
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