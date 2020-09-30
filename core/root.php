<?php

    // Classes

        // ResponseController:
        require_once "ResponseController/ResponseController.php";

        // Markers:
        require_once "MarkerPatt/MarkerPatt.php";


    $responseController = new ResponseController();
    $responseController->setResponse("get", $_GET);
    $responseController->setResponse("post", $_POST);

    if (var_dump($responseController->responses["get"]["type"]) != null) {
        echo 123;
    }
?>