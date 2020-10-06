<?php 

    // Librares

        // MysqliDb:
        require_once SN_DIRECTORY_ROOT."libs/PHP-MySQLi-Database-Class/MysqliDb.php";
        // MysqliDb -> dbObject:
        require_once SN_DIRECTORY_ROOT."libs/PHP-MySQLi-Database-Class/dbObject.php";

        // SnCache (cache):
        require_once SN_DIRECTORY_ROOT."libs/SnCache/SnCache.php";

    class DbController extends SnController {

        protected $MysqliDb;

        protected $SnCache;

        public $errors = [];

        protected $tables = [];

        public function __construct($config_db, $tables) {

            // Set tables:
                $this->tables = $tables;

            // Set config:
                $this->config = $config_db;

            // Init MysqlDb:
                $this->MysqliDb = new MysqliDb($this->config["mysql"]);
                
                $this->getError();

                // Enable autoload:

                dbObject::autoload("models");

            // Init SnCache:
                $this->SnCache = new SnCache(SN_DIRECTORY_ROOT."core/cache/", ".tmp");
            
        }

        public function getAllMarkers() {
            
            $this->tables["root"] = dbObject::table("sn_exkyrsia")::ArrayBuilder()->get();
            $this->tables["childnodes"] = dbObject::table("sn_exkyrsia_childnodes")::ArrayBuilder()->get();
            $this->tables["config"] = dbObject::table("sn_exkyrsia_config")::ArrayBuilder()->get();
            $this->tables["info"] = dbObject::table("sn_exkyrsia_info")::ArrayBuilder()->get();

            $markerPattController = new MarkerPattController();

            $prepared = [];

            foreach ($this->tables["root"] as $key => $value) {

                $prepared[$key] = [
                    "id" => $value["id"],
                    "info" => $this->tables["info"][$key],
                    "config" => $this->tables["config"][$key],
                    "pattern" => $markerPattController->getMarkerPatternById($value["id"]),
                    "childnodes" => []
                ];

                // ChildNodes:

                foreach ($this->tables["childnodes"] as $c_key => $c_val) {
                    if ($value["id"] == $c_val["id"]) {
                        $prepared[$key]["childnodes"][$c_key] = [];
                        $prepared[$key]["childnodes"][$c_key] += $c_val;
                    }
                }

            }
            return $prepared;
        }

        //
        // PROTECTED FUNCTIONS
        //

        protected function getError() {

            if ($this->MysqliDb->getLastErrno() == 0) return 1;

            $prepared = [$this->MysqliDb->getLastErrno() => $this->MysqliDb->getLastError()];

            $this->errors += $prepared;

            return $prepared;
        }
    }

?>