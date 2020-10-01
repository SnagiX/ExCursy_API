<?php

    /* 
        $_GET attributes:
        
        Important:

            +==========
            type : text
            +==========
            What kind of query you responsed
                
                "marker_patt" : text
                
                Attributes for "marker_patt":

                    +==========
                    marker_id : int
                    +==========
                    Id of responsed marker


        Not important:

            -

    */

    // Enable this when you publishing api in master branch
    // error_reporting(0);

    // Turn on / off api:
    define("API_ON", true);

    if (API_ON !== true) {
        header("HTTP/1.0 503 Service Unavailable");
        die();
    }
    
    // Import core:
    require_once "core/root.php";

?>