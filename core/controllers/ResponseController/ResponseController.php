<?php

    class ResponseController extends SnController {

        public $responses = [
            "get" => null,
            "post" => null,
        ];
        
        // Construct:
        // Attributes:
        // $flags["get"] : arr    set $_GET resp.
        // $flags["post"] : arr    set $_POST resp.
        // $flags["filter_enable"] : bool   clean $_GET & $_POST from bad text & code
        // $flags["filter_args"] : arr      set arguments for filters
        public function __construct($flags = []) {

            $resp = ["get", "post"];
            
            foreach ($resp as $type) {
                if (isset($flags[$type])) {
                    $this->responses[$type] = $flags[$type];
                }
            }

            if (isset($flags["filter_enable"])) {
                if ($flags["filter_enable"] == true) {
                    $this->filter($flags["filter_args"]);
                }
            }
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

        //
        // PROTECTED FUNCTIONS
        //

        protected function filter($args) {

            foreach ($this->responses as $method => $array) {
                filter_var_array($array, $args);
            }
        }
    }

?>