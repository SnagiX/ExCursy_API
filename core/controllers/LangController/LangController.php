<?php

    class LangController extends SnController {

        public $langs = [];

        public $lang = [];
        
        public function __construct($config_lang) {

            // Init config:
            $this->config = $config_lang;

            // Init current language:
            $this->currentLang = $this->config["default_lang"];
            
            // Set default language:
            $this->setLanguage($this->currentLang);
        }
        
        //
        // PUBLIC FUNCTIONS
        //

        // Set language:
        public function setLanguage($lang) {
            
            foreach ($this->config["languages"] as $val) {
                
                if ($lang == $val) {

                    $this->currentLang = $val;

                    if (isset($this->langs[$val])) return 1;

                    $this->parseLanguageFile($val);

                    $this->lang = $this->langs[$val];

                    return 1;

                    break;
                }

            }

            return 0;

        }

        //
        // PROTECTED FUNCTIONS
        //

        // Parse language file:
        protected function parseLanguageFile($lang) {

            if (!isset($lang)) $lang = $this->currentLang;

            // Open lang file:

            $path = $this->config["path"].$lang.".json";

            $handle = fopen($path, "r");

            $data = json_decode(fread($handle, filesize($path)), true);

            $this->langs[$lang] = $data;

            return 1;
        }

    }

?>