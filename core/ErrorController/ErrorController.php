<?php 

    class ErrorController {

        public $outputFormat = "text/json";
        
        public function __construct($outputFormat = "text/json") {
            $this->outputFormat = $outputFormat;
        }


        // Throw basic error:
        public function throwError($text) {

            if (empty($text)) return 0;
            
            if ($this->outputFormat = "text/json") {
                echo '
                    {
                        "statement": "error",
                        "error": {
                            "why": "'.$text.'"
                        }
                    }
                ';
            }
            return 1;
        }
    }

?>