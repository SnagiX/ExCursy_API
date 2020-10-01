<?php

    class OutputController {

        public $outputFormat = "text/json";

        public function __construct($outputFormat = "text/json") {
            $this->outputFormat = $outputFormat;
        }

        // Function to change output format:
        public function changeOutputFormat($out_name) {
            if ($out_name == null) return 0; 
            $this->outputFormat = $out_name;
            return 1;
        }

        public function applyHeader() {
            header("Content-Type: ".$this->outputFormat);
            return 1;
        }

    }

?>