<?php

    // Controllers

        // Main controller (SnController) (: SYSTEM):
        require_once SN_DIRECTORY_ROOT."core/system/SnController/SnController.php";


        // ResponseController:
        require_once SN_DIRECTORY_ROOT."core/controllers/ResponseController/ResponseController.php";

        // OutputController:
        require_once SN_DIRECTORY_ROOT."core/controllers/OutputController/OutputController.php";

        // NetworkController:
        require_once SN_DIRECTORY_ROOT."core/controllers/NetworkController/NetworkController.php";

        // LangController:
        require_once SN_DIRECTORY_ROOT."core/controllers/LangController/LangController.php";

        // DbController:
        require_once SN_DIRECTORY_ROOT."core/controllers/DbController/DbController.php";

        // Marker_patt:
        require_once SN_DIRECTORY_ROOT."core/controllers/MarkerPattController/MarkerPattController.php";

        // Model controller:
        require_once SN_DIRECTORY_ROOT."core/controllers/ModelController/ModelController.php";

    // Create controllers:
        
        // Response management:
        $responseController = new ResponseController([
            "get" => $_GET,
            "post" => $_POST,
            "filter_enable" => true,
            "filter_args" => [
                "get" => [
                    "marker_id" => ["filter" => FILTER_SANITIZE_NUMBER_INT],
                    "type" => ["filter" => FILTER_SANITIZE_STRING],
                    "lang" => ["filter" => FILTER_SANITIZE_STRING]
                ]
            ]
        ]);

        // Output:
        $outputController = new OutputController(SN_CONFIG["OutputController"], "text/json");

        // Network:
        $networkController = new NetworkController();

        // Language:
        $langController = new LangController(SN_CONFIG["LangController"]);

        // Marker_patts:
        $markerPattController = new MarkerPattController();

        // Models:
        $modelController = new ModelController(SN_CONFIG["ModelController"]);

        // Db:
        $dbController = new DbController(SN_CONFIG["DbController"], [
            "root" => "",
            "info" => "",
            "config" => "",
            "childnodes" => ""
        ]);

    // =====================================================

    // Check if Db has no connection:
    if (!empty($dbController->errors)) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 5, "isDie" => true]);

    // =====================================================

    //
    // ATTRIBUTES - NOT IMPORTANT
    //

    // Set language:

    if ($responseController->getAttrubuteValue("lang", "get") !== null) {

        // Get lang attr:
        
        $langController->currentLang = $responseController->getAttrubuteValue("lang", "get");

        $res = $langController->setLanguage($langController->currentLang);
        
        if (!$res) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 4, "isDie" => true]);

        unset($res);

    }

    //
    // ATTRIBUTES - IMPORTANT
    //

    // Switch for "type" argument (main (!) argument)

        // Let's decide, what the action we need to do:
        $responseController->typeOfResponse = $responseController->getAttrubuteValue("type", "get");

        // If TYPE argument is empty, throw error:
        if (!isset($responseController->typeOfResponse)) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 1, "isDie" => true]);

    switch ($responseController->typeOfResponse) {

        // get .patt link of marker's id:
        case 'pattern_link':

            $res = $responseController->getAttrubuteValue("marker_id", "get");

            if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {
                
                $patt = $markerPattController->getPatternLinkById($res);

                if (!$patt) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 2, "isDie" => true]);

                $outputController->addField("marker", [
                    "id" => $res,
                    "link" => $patt
                ]);

                $outputController->show(true);

            }

            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 3, "isDie" => true]);
            
        break;

        // get .patt file of marker's id:
        case "pattern_file":

            $res = $responseController->getAttrubuteValue("marker_id", "get");

            if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {

                $patt = $markerPattController->getMarkerPatternById($res);

                if (!$patt) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 2, "isDie" => true]);

                $outputController->addField("marker", [
                    "id" => $res,
                    "value" => $patt
                ]);

                $outputController->show(true);

            }  
            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 3, "isDie" => true]);

        break;

        // Show original pattern (without json):
        case "pattern_file_original":

            $res = $responseController->getAttrubuteValue("marker_id", "get");

            if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {

                $patt = $markerPattController->getMarkerPatternById($res);

                $outputController->changeOutputFormat("text/html");

                $outputController->applyHeaders();

                $outputController->textToOutput = "<pre>".$patt;

                $outputController->show(true);
            }

            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 3, "isDie" => true]);
            
        break;
        
        // Show original model (without json):
        case "model_original":

            $res = $responseController->getAttrubuteValue("marker_id", "get");

            if ($res != null && filter_var($res, FILTER_VALIDATE_INT)) {

                $model = $modelController->getModel($res);

                if (!$model) $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 7, "isDie" => true]);

                $outputController->changeOutputFormat("text/html");

                $outputController->applyHeaders();

                $outputController->textToOutput = $model;

                $outputController->show(true);
            }

            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 3, "isDie" => true]);

        break;

        // Show all markers:
        case 'get_all_markers':
            $res = $dbController->getAllMarkers();

            $outputController->addField("markers", $res);

            $outputController->show(true);

        break;

        // Send emails to us:
        case 'landing_email':
            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 6, "isDie" => true]);
        break;

        default:
            $outputController->throwError(["arr" => $langController->lang["errors"], "code" => 1, "isDie" => true]);
        break;
    }
    
?>