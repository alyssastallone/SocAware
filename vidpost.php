<?php
include_once 'header.php'
?>

<?php
require_once 'includes/dbh.inc.php';

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
                <form>
                <div class="form-group">
               <label for="exampleFormControlFile1">Select a video to share:</label>
               <div class = "row py-2"></div>
               <input type="file" class="form-control-file" id="exampleFormControlFile1">
                 </div>
                 <div class="form-group py-3">
                
                  <h6 class = "display-9 pt-3">Add text: (optional) </h6>
                   <textarea class="form-control"  id="textarea" rows="2"></textarea>
                    <div class = "row">
                    <div class="col col-lg-6"></div>
                    <div class="col col-lg-4"></div>
                        <div class = "col-lg-2">
                         <button type="submit" name="submit" class="btn btn-md btn-secondary btn-block pl-5 mt-3" >Post</button>
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