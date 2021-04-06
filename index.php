<?php
include_once 'header.php'
?>
    
<?php
// Initialize the session
//session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /timeline.php");
    exit;
}
 
// Include config files
require_once 'includes/dbh.inc.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
        //echo $username_err."<br>";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
        //echo $password_err."<br>";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE `username` = ?;";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;                     
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        //echo "verifying password with hash: ".$password.", ".$hashed_password;
                        $myString = "test";
                        $myHash = password_hash($myString, PASSWORD_DEFAULT);
                        //echo "result is: ".password_verify($myString, $myHash)."<br>";
                        if(password_verify($password, $hashed_password))
                        {
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to timeline page
                            header("location: /timeline.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Incorrect password. Please try again.";
                            //echo $password_err."<br>";
                            //echo $hashed_password;
                        }
                    }
                } else{
                    //Display an error message if username doesn't exist
                    $username_err = "Username not found. Please try again.";
                    //echo $username_err."<br>";
                }
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.".mysqli_error($conn);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
    <div class="text-center">
    <form style = "max-width: 480px; margin:auto;" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <img class="mt-4 mb-4" src="images/logo.png" width = "150" height = "150" alt="Logo">
        <h1 style=" font-family : Verdana, Geneva "; = "h3 mt-2 mb-3 font-weight-normal">Please Log In</h1>

    <div class = "mt-4 mb-4">
      <label for = "username" class = "sr-only"></label>
      <input type = "username" name = "username" id = "username" class="form-control" placeholder="Username" required autofocus>
</div>
      <label for = "password" class = 'sr-only'></label>
      <input type = "password" name = "password" id = "password" placeholder="Password" 
      class="form-control">

      <?php

      if(!empty($username_err)){
            echo "<br>",$username_err,"</br>";
      }
      if(!empty($password_err)){
        echo "<br>",$password_err,"</br>";
    }
      ?>

      <div class="checkbox mt-3">
         <label>
           <input type = "checkbox"
           value = "remember-me"> Remember Me?
         </label>
      </div>
      <div class = "mt-3">   
        <button class="btn btn-lg btn-secondary btn-block"
        >Log In</button>
        <div class ="mt-4">
      <label for = "need-account" class="pb-3">Don't Have an Account?</label>
      <div class = "pb-5">
     <a href=createaccount.php class = "btn btn-secondary btn-block my-1"
     role = "button">Create Account</a>
      </div>
    </div>
    </form>
    </div>

<?php
include_once 'footer.php'
?>
