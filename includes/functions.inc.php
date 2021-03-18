<?php

function emptyInput($firstname, $lastname, $birthday, $email, $username, $password, $gender) {
   $result;
   if(empty($firstname) || empty($lastname) || empty($birthday) || empty($email) || empty($username) || empty($password) || empty($gender)) {
    $result = true;
   }
   else {
       $result = false;
   }
   return $result;
}


function infoExists($conn, $email, $username){
    $sql = "SELECT * FROM Users WHERE email = ? OR username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../createaccount.php?error=emailtaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $email, $username, $password, $birthday, $gender) {
    $sql = "INSERT INTO Users(fname, lname, email, username, password, birthday, gender) VALUES(?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../createaccount.php?error=emailtaken");
        exit();
    }

    $hashedPassword = password_hash($pasword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $username, $hashedPassword, $birthday, $gender);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //header("location: ../timeline.php?error=none");
    exit();


}

function emptyInputLogin($username, $password) {
    $result;
    if(empty($username) || empty($password)) {
     $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }

 function loginUser($conn, $username, $password){
    $infoExists = infoExists($conn, $username);

    if($infoExists === false){
        //header("location: ../index.php?error=wronglogin");
        exit();
    }


$passwordHashed = $infoExists["passwordCol"];
$checkPassword = password_verify($password, $passwordHashed);

if($checkPassword === false){
    //header("location: ../timeline.php?error=wronglogin");
    exit();
}
else if ($checkPassword === true){
    session_start();
    $_SESSION["username"] = $infoExists["username"];
    //header("location:../timeline.php");
    exit();
    }

 }




