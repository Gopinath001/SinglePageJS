<?php

require_once(__DIR__."/../abstract/utilis.php");
require_once(__DIR__."/../interfaces/response.php");

class response extends utilis implements Iresponse {
    
    private function pageResponse(){
        return $this->getPageScript();
    }

    /**
     * function buildResponse
     *
     * @param [request] $request
     * @return [array] - request params
     */
    public function buildResponse($request){
        $request->parseArguments();
        return $request->processRequest();
    }

    public function getInitialResponse(){
        return $this->pageResponse();
    }


    private function getPageScript(){
        return $this->getConfig() . Iresponse::singlePageJsSrc;        
    }

    private function getConfig(){
        global $CFG;
        return '<script>var spjs = {};
            spjs.config = { 
            "URL": "api/index.php",
            "ENDPOINT": "'.Irequest::ENDPOINT.'", 
            "TIMESTAMP": "'.Irequest::TIMESTAMP.'",
            "ENDPOINT_ARGS":"'.Irequest::ENDPOINT_ARGS.'",
            "ARGS_BEGIN": "'.Irequest::ARGS_BEGIN.'",
            "ARGS_END": "'.Irequest::ARGS_END.'"
            };            
            </script>';
    }
}

?>