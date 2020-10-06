<?php 

    class SnCache {
        
        public $path;

        public $prefix;

        public function __construct($path, $prefix) {
            $this->path = $path;
            $this->prefix = $prefix;
        }

        public function read($fileName) {

            $fileName = $this->getFilePath($fileName);

            if (file_exists($fileName)) {

                $handle = fopen($fileName, 'rb');

                $variable = fread($handle, filesize($fileName));

                fclose($handle);

                return unserialize($variable);
            } else return null;
        }
        public function write($fileName, $variable) {
            
            $fileName = $this->getFilePath($fileName);

            $handle = fopen($fileName, 'a');

            fwrite($handle, serialize($variable));

            fclose($handle);
        }
    
        public function delete($fileName) {
            $fileName = $this->getFilePath($fileName);

            @unlink($fileName);
        }

        //
        // PROTECTED FUNCTIONS
        //

        protected function getFilePath($fileName) {
            return $this->path.$fileName.$this->prefix;
        }

    }
    

?>