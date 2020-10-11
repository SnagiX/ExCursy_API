<?php

    class MarkerPattController extends SnController {

        // 
        // PUBLIC VARIABLES
        //

        public $patternDirectory;

        public $patternExtension;

        public $patternPrefix;

        public $maxPatternId;

        public function __construct($args = ["patternDirectory" => "assets/patt_files/", "patternExtension" => ".patt", "patternPrefix" => "pattern-", "maxPatternId" => 30]) {
            
            // Set Pattern Extension:
            $this->patternExtension = $args["patternExtension"];
            // Set Pattern Directory:
            $this->patternDirectory = $args["patternDirectory"];
            // Set Pattern Prefix:
            $this->patternPrefix = $args["patternPrefix"];
            // Set Maximum Pattern Id:
            $this->maxPatternId = $args["maxPatternId"];
        }

        // Get marker by id (from 1 to 30)

        public function getMarkerPatternById($id) {
            if (empty($id)) return 0;

            if ($id > $this->maxPatternId || $id < 1) return 0;
            
            $file = $this->patternDirectory.$this->patternPrefix.$id.$this->patternExtension;

            return $this->file("read", $file);
            
        }

        public function getPatternLinkById($id) {
            if (empty($id)) return 0;
            
            if ($id > $this->maxPatternId || $id < 1) return 0;

            // $link = SN_NETWORK_PROTOCOL."://".$_SERVER["HTTP_HOST"]."/".SN_DIRECTORY_WEBROOT.$this->patternDirectory.$this->patternPrefix.$id.$this->patternExtension;

            $link = SN_NETWORK_PROTOCOL."://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?type=pattern_file_original&marker_id=".$id;

            if (file_exists($this->patternDirectory.$this->patternPrefix.$id.$this->patternExtension)) {
                return $link;
            }

            return 0;
        }
    }

?>