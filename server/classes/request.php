<?php
/**
 * @author Gopinath v <gopinath@infinitisoftware.net>
 * @filename request.php
 */

require_once("utilis.php");
require_once(__DIR__."/../interfaces/request.php");

/**
 * class request
 * handles incomming requests
 */
class request extends utilis implements Irequest{

    /**
     * function parseArguments
     * 
     * @throws Exception "can not process function"
     * @throws Exception "can not process args"
     * @throws Exception "Invalid Request"
     * @return void
     */
    public function parseArguments(){
        if(!$this->checkArguments(Irequest::ENDPOINT))
            throw new Exception("can not process function");
        if(!$this->checkArguments(Irequest::ENDPOINT_ARGS_POST))
            throw new Exception("can not process args");
    
        $this->funName = filter_var($_POST[Irequest::ENDPOINT], FILTER_SANITIZE_STRING);
        $args = $_POST[Irequest::ENDPOINT_ARGS_POST];
        
        /* validation for getting two params for all the requests, 
           NOTE: can be any
         */
        foreach($args as $key => $value){
            switch($key){
                case 0:
                    $value = str_replace([Irequest::ARGS_BEGIN, Irequest::ARGS_END],'',$value);
                    $this->args[] =$value;
                    break;
                case 1:
                    $value = str_replace([Irequest::ARGS_BEGIN, Irequest::ARGS_END],'',$value);
                    $this->args[] = $value;
                    break;
                default:
                    throw new Exception("Invalid Request");
            }
        }
    }
    
    /**
     * function processRequest,
     *  (sample)here the process request only return the data,
     *  
     * @return void
     */
    public function processRequest(){
        return [$this->funName,$this->args];
    }
    
}
?>