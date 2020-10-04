<?php

    /* 
        $_GET attributes:
        
        Important:

            +==========
            type : text
            +==========
            What kind of query you responsed
                
                "marker_patt" : text
                
                Attributes:

                    +==========
                    marker_id : int (from 1 to 30)
                    +==========
                    Id of responsed marker

                "get_all_markers" : text




        Not important:

            -

    */

    // Enable this when you publishing api in master branch
    // error_reporting(0);

    // Turn on / off api:
    define("SN_API_ON", true);

    // Init root directory:
    define("SN_DIRECTORY_ROOT", __DIR__."/");

    // Init system config:
    define("SN_DIRECTORY_CONFIG", SN_DIRECTORY_ROOT."core/config/config.json");

    // Open prepared config:

    // ============= //

    $handle = fopen(SN_DIRECTORY_CONFIG, "r");
    $config = fread($handle, filesize(SN_DIRECTORY_CONFIG));

    // Config const
    define("SN_CONFIG", json_decode($config, true));

    fclose($handle);
    unset($config);
    unset($handle);

    // ============= //

    if (SN_API_ON !== true) {
        header("HTTP/1.0 503 Service Unavailable");
        die();
    }
    
    // Import core:
    require_once "core/root.php";

?>