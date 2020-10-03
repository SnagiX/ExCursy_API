<?php

    class ResponseController {

        public $responses = [
            "get" => null,
            "post" => null,
            "request" => null
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

        // Get value of attribute:
        //
        // Attributes:
        // $attr_name : str                             title of root "type" name
        // $method : text (get || post || request)      Where you need to find attribute
        //
        // Returns:
        // null - falied
        // : str - completed 
        public function getAttrubuteValue($attr_name, $method) {
            if (empty($this->responses[$method][$attr_name])) return null;
            return $this->responses[$method][$attr_name];
        }
    }

?>