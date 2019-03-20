<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(filter_input(INPUT_POST, 'yearOfBirth', FILTER_VALIDATE_INT))
    {
        $yob = (int)$_POST['yearOfBirth'];
//        var_dump("JESTE int " . $yob);
    }
//    if(is_int($_POST["yearOfBirth"])) echo "int<br>";
//    if(is_numeric($_POST["yearOfBirth"])) echo "numer<br>";
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = ucwords($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }



    if($genderErr) {
        header("Location: views/form.view.php?nameErr=1&emailErr=1");
    }
}


function test_input($a){


//    echo 'asd';
    return $a;
}
?>