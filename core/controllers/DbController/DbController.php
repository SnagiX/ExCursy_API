<?php 

    // Librares

        // MysqliDb:
        require_once SN_DIRECTORY_ROOT."libs/PHP-MySQLi-Database-Class/MysqliDb.php";
        // MysqliDb -> dbObject:
        require_once SN_DIRECTORY_ROOT."libs/PHP-MySQLi-Database-Class/dbObject.php";

    class DbController {

        protected $config;

        protected $MysqliDb;

        protected $markers = [
            "root" => "",
            "info" => "",
            "config" => "",
            "childnodes" => ""
        ];

        public function __construct($config_db) {

            // Set config:

            $this->config = $config_db;

            $this->MysqliDb = new MysqliDb($this->config["mysql"]);

            dbObject::autoload("models");
            
        }

        public function getAllMarkers() {
            
            $this->markers["root"] = dbObject::table("sn_exkyrsia")::ArrayBuilder()->get();
            $this->markers["childnodes"] = dbObject::table("sn_exkyrsia_childnodes")::ArrayBuilder()->get();
            $this->markers["config"] = dbObject::table("sn_exkyrsia_config")::ArrayBuilder()->get();
            $this->markers["info"] = dbObject::table("sn_exkyrsia_info")::ArrayBuilder()->get();

            $markerPattController = new MarkerPattController();

            $prepared = [];

            foreach ($this->markers["root"] as $key => $value) {

                $prepared[$key] = [
                    "id" => $value["id"],
                    "info" => $this->markers["info"][$key],
                    "config" => $this->markers["config"][$key],
                    "pattern" => $markerPattController->getMarkerPatternById($value["id"]),
                    "childnodes" => []
                ];

                // ChildNodes:

                foreach ($this->markers["childnodes"] as $c_key => $c_val) {
                    if ($value["id"] == $c_val["id"]) {
                        $prepared[$key]["childnodes"][$c_key] = [];
                        $prepared[$key]["childnodes"][$c_key] += $c_val;
                    }
                }

            }
            return $prepared;
        }
    }

?>