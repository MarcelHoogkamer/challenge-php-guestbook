<?php

session_start();

function test_input(string $data) : string {
return trim(htmlspecialchars($data));
}

$nameErr = $emailErr = $titleErr = $messageErr = "";
$name = $email = $title = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //NAME

    if (empty($_POST["name"])) {
        $nameErr = "* name is required";
    } elseif (!empty($_POST["name"]) && is_numeric($_POST["name"])) {
        $nameErr = "* text characters only";
    } else {
        $name = test_input($_POST["name"]);
        $_SESSION["name"] = $name;
    }

    // EMAIL

    if (empty($_POST["email"])) {
        $emailErr = "* email-address is required";
    } elseif (!empty($_POST["email"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $emailErr = "* email-address is invalid";
        } else {
            $email = test_input($_POST["email"]);
            $_SESSION["email"] = $email;
        }
    }

    //TITLE

    if (empty($_POST["title"])) {
        $titleErr = "* title is required";
    } elseif (!empty($_POST["title"]) && is_numeric($_POST["title"])) {
        $titleErr = "* text characters only";
    } else {
        $title = test_input($_POST["title"]);
        $_SESSION["title"] = $name;
    }

    //MESSAGE

    if (empty($_POST["message"])) {
        $messageErr = "* message is required";
    } else {
        $message = test_input($_POST["message"]);
        $_SESSION["message"] = $message;
    }
}


$isValid = (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["title"]) && !empty($_POST["message"]));