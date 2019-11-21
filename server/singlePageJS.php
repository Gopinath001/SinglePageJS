<?php
/**
 * @author Gopinath v <gopinath@infinitisoftware.net>
 * @filename singlePageJS.php
 */


require_once("classes/response.php");
require_once("classes/request.php");

/**
 * class SinglePageJS
 * single page php applications made simple
 */
class SinglePageJS{
    private $response;
    private static $instance = null;

    static function getInstance(){
        if(is_null(SinglePageJS::$instance))
            SinglePageJS::$instance = new SinglePageJS();
        return SinglePageJS::$instance;
    }


    private function __construct(){
        $this->response = new response();
        $this->request = new request();
    }

    
    public function script($jsScript){
        $this->response->addScript($jsScript);
    }


    /* support multiple param calling support */
    public function call($fn, $param){
        $param = func_get_args(); 
        $fn = array_shift($param);
        $this->response->addCall($fn, $param);
    }

    public function assign($element, $method, $value){
        $this->response->addAssign($element,$method,$value);
    }

    /**
     * function processRequest
     * ajax requests have post value associated, configure 
     *  them in interfaces/request, ENDPOINT_ARGS is used as
     *  deciding factor.
     *  
     * @return void
     */
    public function processRequest(){
        if(!isset($_POST[Irequest::ENDPOINT]))
            return $this->response->getInitialResponse();
        return $this->response->buildResponse($this->request);
    }

    public function completeRequest(){
        $response = $this->response->getResponse();
        ob_start();ob_clean();
        echo json_encode($response);
    }
}

?>
