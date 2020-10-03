<?php

    class OutputController {

        public $outputFormat = "text/json";

        public $headers = [];

        public $textToOutput = [
            "type" => ""
        ];

        public function __construct($outputFormat = "text/json") {

            // Set output format:

            $this->outputFormat = $outputFormat;
            $textToOutput["type"] = "response";

            // Set headers:

            $this->headers = [
                "Content-Type" => "Content-Type: ".$this->outputFormat
            ];
        }

        // Function to change output format:
        public function changeOutputFormat($out_name) {
            if ($out_name == null) return 0; 

            $this->outputFormat = $out_name;

            // Also change header:
            $this->headers["Content-Type"] = "Content-Type: ".$out_name;
            
            return 1;
        }

        // Add new field into textToOutput:
        public function addField($title, $value) {
            $this->textToOutput[$title] = $value;
            return 1;
        }
        
        // Show prepared textToOutput:
        public function show($isDie = true) {

            // Preparing to show:

            $out = $this->textToOutput;

            if (empty($out["type"])) $out["type"] = "response";

            if ($this->outputFormat = "text/json") {
                echo json_encode($out);
            }

            // Die

            $this->dieCondition($isDie);
        }

        public function applyHeaders() {
            header("Content-Type: ".$this->outputFormat);
            return 1;
        }

        // Throw basic error:
        public function throwError($text, $isDie = true, $code = -1) {

            if (empty($text)) return 0;

            $this->textToOutput = [];

            $this->textToOutput["type"] = "error";
            $this->textToOutput["error"] = ["code" => $code, "why" => $text];
            
            if ($this->outputFormat = "text/json") {
                echo json_encode($this->textToOutput);
            }

            // Die

            $this->dieCondition($isDie);
            return 1;
        }


        // PROTECTED FUNCTIONS //

        protected function dieCondition($condition) {
            if ($condition) die();
            return 0;
        }

    }

?>