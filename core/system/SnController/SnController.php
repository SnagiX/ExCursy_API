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

    }




    // Объявим интерфейс 'iTemplate'
    interface iTemplate
    {
        public function setVariable($name, $var);
        public function getHtml($template);
    }

?>