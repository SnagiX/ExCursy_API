<?php

    class ModelController extends SnController {

        //
        // PUBLIC VARIABLES
        //

        // Model directory:
        protected $modelDirectory;


        public function __construct($sn_config) {

            // Init config:
            $this->config = $sn_config;

        }

        public function getModel($m_id) {
            $link = $this->getLink($m_id, 0);
            
            if (!$link) return 0;

            $model = $this->file("read", $link);

            return $model;
        }

        public function getLink($m_id, $isWeb = 1) {

            $m_path = SN_DIRECTORY_ROOT.$this->config["modelDirectory"].$m_id."/".$this->config["modelPrefix"]."/";

            $dir = scandir($m_path);

            array_shift($dir);
            array_shift($dir);

            if (!is_array($dir)) return 0;

            if ($isWeb) {
                return $m_path = SN_NETWORK_PROTOCOL."://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?type=model_original&marker_id=".$m_id;
            }

            return $m_path.$dir[0];

        }

    }

?>