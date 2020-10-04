<?php

    // Controllers

        // Main controller (SnController) (: SYSTEM):
        require_once SN_DIRECTORY_ROOT."core/system/SnController/SnController.php";


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
        $langController = new LangController(SN_CONFIG["LangController"]);

        // Marker_patts:
        $markerPattController = new MarkerPattController();

        // Db:
        $dbController = new DbController(SN_CONFIG["DbController"]);

    // =====================================================

    // Apply our headers:
    $outputController->applyHeaders();

    // =====================================================

    //
    // ATTRIBUTES - NOT IMPORTANT
    //

    // Set language:

    if ($responseController->getAttrubuteValue("lang", "get") !== null) {

        // Get lang attr:
        
        $langController->currentLang = $responseController->getAttrubuteValue("lang", "get");

        $res = $langController->setLanguage($langController->currentLang);
        
        if (!$res) {
            $outputController->throwError($langController->lang["errors"][4], true);
        }

        unset($res);

    }

    //
    // ATTRIBUTES - IMPORTANT
    //

    // Switch for "type" argument (main (!) argument)

        // Let's decide, what the action we need to do:
        $responseController->typeOfResponse = $responseController->getAttrubuteValue("type", "get");

        // If argument is empty, throw error:
        if (!isset($responseController->typeOfResponse)) $outputController->throwError($langController->lang["errors"][1]);

    switch ($responseController->typeOfResponse) {

        // get .patt code of marker's id:
        case 'marker_patt':

            $res = $responseController->getAttrubuteValue("marker_id", "get");

            if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {

                $patt = $markerPattController->getMarkerPatternById($res);

                if (!$patt) $outputController->throwError($langController->lang["errors"][2], true);

                $outputController->addField("marker", [
                    "id" => $res,
                    "value" => $patt
                ]);

                $outputController->show(false);

                unset($patt);
            } else {
                $outputController->throwError($langController->lang["errors"][3], true);
            }

            unset($res);
            
        break;

        // Show all markers:
        case 'get_all_markers':
            $res = $dbController->getAllMarkers();

            $outputController->addField("markers", $res);

            $outputController->show(false);

        break;

        // Send emails to us:
        case 'landing_email':
            $outputController->throwError($langController->lang["errors"][0], true);
        break;

        default:
            $outputController->throwError($langController->lang["errors"][1], true);
        break;
    }
    
?>