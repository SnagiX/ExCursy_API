<?php

    class MarkerPattController extends SnController {

        // 
        // PUBLIC VARIABLES
        //

        public function __construct($markerPattConfig) {

            // Set local configuration:
            $this->config = $markerPattConfig;            

        }

        // Get marker by id (from 1 to 30)

        public function getMarkerPatternById($id) {

            if (empty($id)) return 0;

            if ($id > $this->config["maxPatternId"] || $id < 1) return 0;
            
            $file = $this->config["patternDirectory"].
                    $this->config["patternPrefix"].
                    $id.
                    $this->config["patternExtension"];

            return $this->file("read", $file);
            
        }

        public function getPatternLinkById($id) {
            if (empty($id)) return 0;
            
            if ($id > $this->config["maxPatternId"] || $id < 1) return 0;

            $link = SN_NETWORK_PROTOCOL."://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?type=pattern_file_original&marker_id=".$id;

            if (file_exists(
                $this->config["patternDirectory"].
                $this->config["patternPrefix"].
                $id.
                $this->config["patternExtension"])) {
                return $link;
            }

            return 0;
        }
    }

?>