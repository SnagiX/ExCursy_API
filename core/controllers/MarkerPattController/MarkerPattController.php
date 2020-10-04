<?php

    class MarkerPattController extends SnController {

        public function __construct() {
            
        }

        // Get marker by id (from 1 to 30)

        public function getMarkerPatternById($id) {
            if (empty($id)) return 0;

            if ($id > 30 || $id < 1) return 0;
            
            $file = SN_DIRECTORY_ROOT."assets/patt_files/pattern-".$id.".patt";

            
            $handle = fopen($file, "r");

            $content = fread($handle, filesize($file));

            fclose($handle);

            return $content;

            
        }
    }

?>