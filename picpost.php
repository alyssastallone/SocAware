<?php
include_once 'header.php'
?>

<?php
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
?>

<?php


$resultmsg = "";
$errormsg = "";
$invalidType = "";

if(isset($_POST["submit"])) {
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 
  /* Check if file already exists
  if (file_exists($target_file)) {
    $errormsg = "Sorry, file already exists.";
    $uploadOk = 0;
  }
  */
  
 /* //Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  */
  
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $invalidType = "Sorry, only JPG, JPEG, & PNG files are allowed. <br>";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $errormsg = "Your file was not uploaded. Please try again! <br>";
  // if everything is ok, try to upload file
  } else {
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      //save to the database
      $username = $_SESSION["username"];
      $text = $_POST['textarea'];
      $video = NULL;

      //echo "check file name: ". $target_file."<br>";
      $sql = "INSERT INTO `posts`(`username`, `text`, `image`, `video`) VALUES (?, ?, ?, ?)";

      if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $username, $text, $target_file, $video);
          // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
          // Redirect to timeline page
          //echo "picture written to DB";
          header("location: timeline.php");
          } else{
          $errormsg = "Something went wrong. Please try again later.". mysqli_error($conn);
          }
      
          // Close statement
         mysqli_stmt_close($stmt);
        }

        $resultmsg = "Your picture ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been successfully uploaded.";
    
    } else {
      $resultmsg = "There was an error uploading your picture.";
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
                <form id = "userpost" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST" enctype="multipart/form-data">
                <div class="form-group">
               <label for="exampleFormControlFile1">Select a picture to share:</label>
               <div class = "row py-2"></div>
               <input type="file" name = "fileToUpload" id="fileToUpload">
                 </div>
                 <div class="form-group py-3">
                
                  <h6 class = "display-9 pt-3">Add text: (optional) </h6>
                   <textarea form="userpost" class="form-control" id="textarea" name = "textarea" rows="2"></textarea>
                    <div class = "row">
                    <div class="col col-lg-6"></div>
                    <div class="col col-lg-4"></div>
                        <div class = "col-lg-2">
                         <button type="submit" name="submit" class="btn btn-md btn-secondary btn-block pl-5 mt-3 mb-3">Post</button>
                        </div>
                    <div class = "row">
                    <div class="col col-sm-2"></div>
                    <?php
                    if(!empty($invalidType))
                    {
                      echo $invalidType;
                    }
                    echo "     " . $resultmsg;
                    echo "     " . $errormsg;
                    ?>
                    </div>
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