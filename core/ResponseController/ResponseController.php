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

        // Get type of response:
        //
        // Attributes:
        // $attr_name : str     title of root "type" name
        //
        // Returns:
        // 0 - falied
        // : str - completed 
        public function getTypeOfResponse($attr_name = "type") {
            if (gettype($this->responses["get"][$attr_name]) == "NULL") return null;
            return $this->responses["get"][$attr_name];
        }
    }

?>