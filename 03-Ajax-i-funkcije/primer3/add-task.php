<?php
//
if(isset($_POST['description']))
{
    // provera requesta da li su podaci validni

    if (empty($_POST["description"])) {
        $descError = "Description is required";
    }

    if(empty($_POST['completed'])) {
        $compError = "Completed must be checked";
    }

    // sacuvamo u bazu


    // saljemo na view novi task ili error
    if($descError || $compError ) {
        echo json_encode([
            'descriptionError' => $descError,
            'complitedError' =>   $compError
        ]);
        exit();
    }
    echo json_encode($_POST);
}
