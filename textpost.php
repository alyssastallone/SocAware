<?php
include_once 'header.php';

//session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true){
    header("location: /index.php");
    exit;
}
//echo $_SESSION["username"];

// Include config file
require_once "includes/dbh.inc.php";
 
// Define variables and initialize with empty values
$postid = $username = $text = $image = $video = "";
$postErr = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo "within POST<br>";

    if (isset($_POST["submit"])) {
        $postid = $_POST[""];
        $username = $_SESSION["username"];
        $text = $_POST["textarea"];
        $image = $_POST[NULL];
        $video = $_POST[NULL];
    }

    if(empty(trim($_POST["textarea"]))){
      $postErr = "Please enter text to post";
    } 
    else{
      // Prepare an insert statement
      $sql = "INSERT INTO posts(postid, username, text, image, video) VALUES (?, ?, ?, ?, ?)";

      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $postid, $username, $text, $image, $video);
        //echo $stmt;
          // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
          // Redirect to timeline page
          header("location: timeline.php");
          } else{
          echo "Something went wrong. Please try again later.". mysqli_error($conn);
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
             <h3 class="card-title mt-2">Sample User</h3>
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

                        <?php
                        if(!empty($postErr)){
                          echo "<br>",$postErr,"</br>";
                         }
                        ?>

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