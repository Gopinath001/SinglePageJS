<?php

/**
 * interface
 *  just changing the const values here is enough,
 * everything else will automatically work
 */
interface Irequest{
    const ENDPOINT = 'demo';
    const ENDPOINT_ARGS = 'args[]';
    const ENDPOINT_ARGS_POST = 'args';
    const ARGS_BEGIN = '<SPJS>';
    const ARGS_END = '</SPJS>';
    const TIMESTAMP = 'timeStamp';

    /* args implementation */
    public function parseArguments();

    /* end point implementation */
    public function processRequest();
}

?>