<?php

interface Iresponse{
    const singlePageJsSrc = "<script src='SinglePageJS/out/singlePageJS.js'>
                    </script>";

    public function getInitialResponse();

    public function buildResponse($request);

}



?>