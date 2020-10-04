<?php

    // Controllers

        // ResponseController:
        require_once SN_DIRECTORY_ROOT."core/controllers/ResponseController/ResponseController.php";

        // OutputController:
        require_once SN_DIRECTORY_ROOT."core/controllers/OutputController/OutputController.php";

        // LangController:
        require_once SN_DIRECTORY_ROOT."core/controllers/LangController/LangController.php";

        // DbController:
        require_once SN_DIRECTORY_ROOT."core/controllers/DbController/DbController.php";

        // Marker_patt:
        require_once SN_DIRECTORY_ROOT."core/controllers/MarkerPattController/MarkerPattController.php";

    // Create controllers:
        
        // Response management:
        $responseController = new ResponseController();
        $responseController->setResponse("get", $_GET);
        $responseController->setResponse("post", $_POST);

        // Output:
        $outputController = new OutputController(SN_CONFIG["OutputController"], "text/json");

        // Language:
        $langController = new LangController();
        $langController->addLanguage("ru");
        $langController->addLanguage("en");

        // Marker_patts:
        $markerPattController = new MarkerPattController();

        // Db:
        $dbController = new DbController(SN_CONFIG["DbController"]);

    // =====================================================

    // Let's decide, what the action we need to do:
    $typeOfResponse = $responseController->getAttrubuteValue("type", "get");

    // if "lang" exists, change current lang.:
    // 
    // In next time :)
    //
    // $language = $responseController->getAttrubuteValue("lang", "get");

    if (gettype($typeOfResponse) != null) {
        
        $outputController->applyHeaders();

        switch ($typeOfResponse) {
            // get .patt code of marker's id:
            case 'marker_patt':

                $res = $responseController->getAttrubuteValue("marker_id", "get");

                if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {

                    $patt = $markerPattController->getMarkerPatternById($res);

                    if (!$patt) $outputController->throwError("Invalid value for marker_id", true);

                    $outputController->addField("marker", [
                        "id" => $res,
                        "value" => $patt
                    ]);

                    $outputController->show(false);

                    unset($patt);
                } else {
                    $outputController->throwError("marker_id value excepts", true);
                }

                unset($res);
                
            break;
            case 'get_all_markers':
                $res = $dbController->getAllMarkers();

                $outputController->addField("markers", $res);

                $outputController->show(false);

            break;
            // Send emails to us:
            case 'landing_email':
                $outputController->throwError("Function is unavailable", true);
            break;

            default:
                $outputController->throwError("Invalid argument(s)", true);
            break;
        }

    }

    
?>