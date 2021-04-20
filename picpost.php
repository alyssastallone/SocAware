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
  mysqli_close($conn);
?>


<?php
error_reporting(0);
?>
<?php
  $msg = "";

  // Define variables and initialize with empty values
  $postid = $username = $text = $image = $video = "";
  $postErr = "";

  
  // If post button is clicked ...
  if (isset($_POST['submit'])) {


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "images/".$filename;

    //$postid = $_POST[""];
    $username = $_SESSION["username"];
    $text = $_POST["textarea"];
    $image = $_POST[$filename];
    $video = $_POST[NULL];
        
          
    //$db = mysqli_connect("localhost", "root", "", "photos");
        // Two things:  1. to upload to the server
        //              2. to write to the database of the file path you just uploaded.


        // Based on the username, create a unique file name or soemthing like that
        // likely you want to save user images in different folders, e.g. for admin
        // the images should be saved under /images/admin/...
        // or just name them differently
        // anyway need a way to distinguish images from different users.

        // goal: make up a file name, which needs to be what you store in the database for the "image" field.
        // e.g. admin/1.jpg  <-- this is what you want to save in the database for the "image" field

        // Get all the submitted data from the form
        $sql = "INSERT INTO posts (username, text, image, video) VALUES (?, ?, ?, ?)";
  
        // Execute query
        // ************** for each step , check if it's successful, and show error message when applicable
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: images
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
  //$result = mysqli_query($conn, "SELECT * FROM image");
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
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST" enctype="multipart/form-data">
                <div class="form-group">
               <label for="exampleFormControlFile1">Select a picture to share:</label>
               <div class = "row py-2"></div>
               <input type="file" class="form-control-file" id="formcontrolfile">
                 </div>
                 <div class="form-group py-3">
                
                  <h6 class = "display-9 pt-3">Add text: (optional) </h6>
                   <textarea class="form-control"  id="textarea" rows="2"></textarea>
                    <div class = "row">
                    <div class="col col-lg-6"></div>
                    <div class="col col-lg-4"></div>
                        <div class = "col-lg-2">
                         <button type="submit" name="submit" class="btn btn-md btn-secondary btn-block pl-5 mt-3">Post</button>
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