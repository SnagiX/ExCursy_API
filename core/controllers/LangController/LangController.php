<?php

    class LangController {

        public $langs = [];

        public $currentLang = "en";
        
        public function __construct($flags = []) {
            
        }
        
        public function currentLanguage($val) {
            $this->currentLang = $val;
            foreach ($this->currentLang as $key => $value) {
                echo $key;
            }
        }

        public function addLanguage($name_of_language) {
            $path_to_folder = SN_DIRECTORY_ROOT."core/lang/";

            $file = $path_to_folder.$name_of_language.".json";

            $handle = fopen($file, "r");

            $data = fread($handle, filesize($file));

            if ($data == false) return 0;

            $this->langs[$name_of_language] = json_decode($data, true);

            // print_r($this->langs);
            // foreach ($this->langs as $key => $value) {
            //     echo $key;
            // }
        }

    }

?>