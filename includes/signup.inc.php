<?php

if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInput($firstname, $lastname, $email, $username, $password, $birthday, $gender) !== false){
        header("location: ../createaccount.php?error=emptyinput");
        exit();
    }

    if(infoExists($conn, $email, $username) !== false){
        header("location: ../createaccount.php?error=emailtaken");
        exit();
    }


    createUser($conn, $firstname, $lastname, $email, $username, $password, $birthday, $gender);

}
else {
    header("location: ../createaccount.php");
    exit();
}