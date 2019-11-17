<?php

interface Iresponse{
    const singlePageJsSrc = "<script src='SinglePageJS/out/singlePageJS.js'>
                    </script>";

    const wrapper =  "<script>
    serverCall = function(endPoint, args) {
    return singlePageJsRequest(endPoint, args );
    };
    </script>";


    public function getInitialResponse();

    public function buildResponse($request);

}



?>