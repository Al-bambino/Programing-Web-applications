<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $yobErr = "" ;
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(filter_input(INPUT_POST, 'yearOfBirth', FILTER_VALIDATE_INT))
    {
        $yob = (int)$_POST['yearOfBirth'];
        if($yob > 2001) {
//            var_dump("JESTE int " . $yob);
            $yobErr = "Niste punletni";
        }
    }


    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = ucwords($_POST["name"]);
    }

    $email = $_POST["email"];
    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            echo 'jestee';
//            var_dump($email);
        }
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

    header("Location: /primer4/views/welcome.php");
    exit();
}

?>