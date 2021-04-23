<?php
include_once 'header.php';
// Include config file
require_once "includes/dbh.inc.php";

//for displaying user's name on side
 // SQL query
 $strSQL = "SELECT fname, lname FROM users WHERE username = '".$_SESSION['username']."'";
 
  // Execute the query (the recordset $rs contains the result)
  $rs = mysqli_query($conn, $strSQL);

  // Loop the recordset $rs
  // Each row will be made into an array ($row) using mysqli_fetch_array
  while($row = mysqli_fetch_array($rs)) {

    // Write the value of the columns
    $firstname = $row['fname'];
    $lastname = $row['lname'];

  }

  // Close the database connection
  //mysqli_close($conn);
 //end display user first and last name

//session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true){
    //header("location: /index.php");
    exit;
}
//echo $_SESSION["username"];

 
// Define variables and initialize with empty values
$postid = $username = $text = $image = $video = "";
$postErr = "";
$errormsg = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        //$postid = $_POST[""];
        $username = $_SESSION["username"];
        $text = $_POST["textarea"];
        $image = NULL;
        $video = NULL;
    
    if(empty($_POST["textarea"]))
    {
      $postErr = "Please enter some text first and try again!";
    } 
    else{
      // Prepare an insert statement
      $sql = "INSERT INTO `posts`(`username`, `text`, `image`, `video`) VALUES (?, ?, ?, ?)";

      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $username, $text, $image, $video);
        //echo $stmt;
          // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
          // Redirect to timeline page
          header("location: timeline.php");
          } else{
          $errormsg = "Something went wrong. Please try again later.". mysqli_error($conn);
          }
      
          // Close statement
         mysqli_stmt_close($stmt);
        }

          }
}

?>

     <!--add new container profile-->
     <div class = "container mb-5">
       <div class="row">
         <div class="col-lg-3">
           <div class="card-body text-center shadow p-4 mb-4 bg-white">
             <img src="images/sample-profile.png" class="rounded-circle" class="img-fluid" max-width= 100%>
             <h3 class="card-title mt-2"><?php
             echo $firstname;
             echo "  ";
             echo $lastname;
             ?></h3>
           </div>
         </div>

         <!-- area where jumbotron with text area will be -->

    <div class = "col-lg-7 shadow p-4 mb-4 mx-5 bg-white" style = "background-color:snow">
        <div class="jumbotron">
         <h3 class="display-8">Create a Post</h3>
            <hr class="my-4"></hr>
             <div class = "grid">
              <div class = "row">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                 <div class="form-group">
                  <h6 class = "display-9">Share your thoughts:</h6>
                   <textarea class="form-control" name="textarea" id="textarea" rows="3"></textarea>
                    <div class = "row">
                    <div class="col col-lg-6"></div>
                    <div class="col col-lg-4"></div>
                        <div class = "col-lg-2">
                         <button type="submit" name="post" class="btn btn-md btn-secondary btn-block pl pl-5 mt-3" >Post</button>
                        </div>
                        <div class = "row">
                        <div class="col col-sm-2"></div>
                        <div class="col"> <?php
                        if(!empty($postErr)){
                          echo "<br>". $postErr."</br>";
                         }
                        ?></div>
                       

                    </div>
                 </div>
                </form>
              </div>
            </div>
         </div>
     </div>
        </div>
     </div>


<?php
include_once 'footer.php'
?>