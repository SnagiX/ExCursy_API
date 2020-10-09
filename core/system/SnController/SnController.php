<?php 

    /*

    Main controller:

    */

    abstract class SnController {

        //
        // PUBLIC VARIABLES
        //



        //
        // PROTECTED VARIABLES
        //

        // Config (must be redefined):
        protected $config;

        
        
        // 
        // PUBLIC FUNCTIONS
        // 

        // Working with file:
        // Attributes:
        // $act : text ("read")     what do u need to do with file
        // $file : text     link of file

        public function file($act, $file) {

            // read file:

            function read($file) {

                $handle = fopen($file, 'r');

                $data = fread($handle, filesize($file));

                fclose($handle);

                return $data;
            }
            
            switch ($act) {
                case 'read':
                    return read($file);
                break;
                
                default:
                    return read($file);
                break;
            }

        }

    }

?>