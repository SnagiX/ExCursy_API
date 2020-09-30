<?php

    class ResponseController {

        public $responses = [
            "get" => null,
            "post" => null
        ];
        
        public function __construct() {
            
        }

        // Set Response:
        // Attributes:
        // $type : str     get || post
        // $resp : str     $_...(GET || POST)
        public function setResponse($type = "get", $resp) {
            if ($type != "get" && $type != "post") {return 0;}
                $this->responses[$type] = $resp;
                return 1;
            
        }
    }

?>