<?php

    // Controllers

        // ResponseController:
        require_once "ResponseController/ResponseController.php";

        // OutputController:
        require_once "OutputController/OutputController.php";

        // ErrorController:
        require_once "ErrorController/ErrorController.php";

        // Marker_patts:
        require_once "MarkerPattController/MarkerPattController.php";


    // Create controllers:
        
        // Response management:
        $responseController = new ResponseController();
        $responseController->setResponse("get", $_GET);
        $responseController->setResponse("post", $_POST);

        // Output:
        $outputController = new OutputController("text/json");

        // Errors:
        $errorController = new ErrorController();

        // Marker_patts:
        $markerPattController = new MarkerPattController();


    // Let's decide, what the action we need to do:
    $typeOfResponse = $responseController->getTypeOfResponse("type");

    if (gettype($typeOfResponse) != null) {
          

        switch ($typeOfResponse) {
            // get .patt code of marker's id:
            case 'marker_patt':
                $markerPattController->buildMarkerPatternById(1);
                // $outputController->applyHeader();
            break;
            
            default:
                $errorController->throwError("Invalid argument(s)");
                $outputController->applyHeader();
            break;
        }
        
        
    }
?>