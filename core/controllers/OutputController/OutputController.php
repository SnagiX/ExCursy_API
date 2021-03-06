<?php

    class OutputController extends SnController {

        //
        // PUBLIC VARIABLES
        //

        // Set Output Format (text/json, text/html)
        public $outputFormat;

        public $headers = [];

        public $textToOutput = [
            "type" => ""
        ];

        public function __construct($config_output, $outputFormat = "text/json") {

            // Set config:

            $this->config = $config_output; 

            // Set output format:

            $this->changeOutputFormat($outputFormat);

            // Set headers:

            $this->headers += [
                "Content-Type" => "Content-Type: ".$this->outputFormat,
            ];

            // Set headers from config:

            foreach ($this->config["headers_prepared"] as $value) {
                array_push($this->headers, $value);
            }

        }

        //
        // PUBLIC FUNCTIONS //
        //


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

            // Some functions:

            function show($content) {

                if (is_array($content)) {
                    print_r($content);
                    return 1;
                }

                echo $content;
                return 1;
            }

            // Preparing to show:

            $out = $this->textToOutput;

            switch ($this->outputFormat) {
                case "text/json":
                    if (empty($out["type"])) $out["type"] = "response";
                    show(json_encode($out));
                break;
                case 'text/html':
                    show($out);
                break;
                default:
                    show("SERVER ERROR - INCORRECT OUTPUT FORMAT");
                break;
            }

            // Apply headers:

            $this->applyHeaders();

            // Die

            $this->dieCondition($isDie);
            return 1;
        }


        // Apply your headers:
        public function applyHeaders() {
            foreach ($this->headers as $val) {
                header($val);
            }
            
            return 1;
        }


        // Throw basic error:
        // Arguments for $args:
        // $args["arr"] : arr     array of errors
        // $args["code"] : int      code of error
        // $args["isDie"] : bool    to Die() or not
        public function throwError($args = []) {

            if (empty($args["arr"]) || empty($args["code"])) return 0;
            if (!is_array($args["arr"])) return 0;

            // Prepared text
            $text = "Unknown error";

            foreach ($args["arr"] as $i => $str) {
                if ($i == $args["code"]) $text = $args["arr"][$i];
            }

            $this->textToOutput = [];

            $this->textToOutput["type"] = "error";
            $this->textToOutput["error"] = ["code" => $args["code"], "why" => $text];
            
            if ($this->outputFormat = "text/json") {
                echo json_encode($this->textToOutput);
            }

            // Apply headers:

            $this->applyHeaders();

            // Die

            $this->dieCondition($args["isDie"]);
            return 1;
        }

        //
        // PROTECTED FUNCTIONS //
        //


        // Die condition:
        protected function dieCondition($condition) {
            if ($condition) die();
            return 0;
        }

    }

?>