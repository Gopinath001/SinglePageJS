<?php

/* Note: ANY AMOUNT OF COMMANDS CAN BE CHAINED */

require_once(__DIR__."/../SinglePageJS/server/singlePageJS.php");
/* variable declartion */
$data = $args =$endPoint = null;
/* getintance */
$singlePagsJs = SinglePageJS::getInstance();
/* process,verify,parse arguments of the request */
$data = $singlePagsJs->processRequest();
/* categorise arguments for preparing response */
$endPoint = $data[0];$args = $data[1];

if($endPoint!="demoEndPoint"){
    http_response_code(400);
    die("no access, invalid request");
}

/* base64_decode again on server & parse it as json */
$val = json_decode(base64_decode($args[0]),1);

/* demo, these are in realtion with scripts from html page */
if($val['demoForm'] =="sampleValue"){
    $singlePagsJs->assign("para","innerHTML","changed the value form 
        the server :: clientSide Values ->". base64_decode($args[0]));
    $singlePagsJs->script("
        setTimeout(function(){
            $('#para').html('this is another command form the server :)');
        }, 2500);");
} 
else if($val['demoForm'] == "execute"){
    $singlePagsJs->script("alert('this is from the server')");
    $singlePagsJs->script("confirm('another one for you?')");
    $singlePagsJs->script("
        setTimeout(function(){
            alert('this is the final.. I swear!!!');
        }, 2500);");
}

else if($val['demoForm'] == "clientFunctionCall"){
    $singlePagsJs->call("clientScript","+this text is from the server+");
}

else{
    http_response_code("404");
    die();
}
    
/* send the response back to the client */
$singlePagsJs->completeRequest();


?>