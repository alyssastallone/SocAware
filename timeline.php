<?php
include_once 'header.php';
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

  //then query the database for all posts to display 
  $sql = "SELECT * from posts ORDER BY postid desc; ";
  //parameters for mysql_query(connection, and above variable)
  $result = mysqli_query($conn, $sql);

  //check to see if the query returns any results


  //mysqli_close($conn);
?>

     <!--add new container profile-->
     <div class = "container mb-5">
       <div class="row">

         <div class="col-md-3">
           <div class="card-body text-center shadow p-4 mb-4 bg-white">
             <img src="images/sample-profile.png" class="rounded-circle" class="img-fluid" max-width= 100%>
             <h3 class="card-title mt-2"><?php
             echo $firstname;
             echo "  ";
             echo $lastname;
             ?>
             </h3>
           </div>
         </div>

         <!-- area where posts will show up on page-->

         <div class = "col-lg-7 shadow p-4 mb-4 mx-5 bg-white" style = "background-color:snow">
            <div class="jumbotron">
             <h3 class="display-7">Timeline</h3>
             <hr class="my-4">
             <div class="d-flex justify-content-center">
             <div class = "container">
               <p class="h3">
               <div class ="row">  
                <?php
                  while ($postRow = mysqli_fetch_array($result))
                  {
                    $user = $postRow['username'];
                    $picture = $postRow['image'];
                    $video = $postRow['video'];
                    $text = $postRow['text'];

                    
                ?>

                

                 <div class = "col sm-4"> <strong><?php echo $user;?></strong> <?php echo "shared: "?></div>
                 <div class = "col sm -3"></div>
                 <div class = "col sm -3"></div>
                </div>
               <div class ="row">
                  <div class = "col sm-3"><?php echo "<img src= '$picture' class = img-fluid>";?></div>
               </div>
               <div class ="row">
                  <div class = "col sm-3">
                  <?php 
                  if($video != NULL){
                  echo "<video src = '$video' controls></video>";}
                  ?>
                   </div>
               </div>
               <div class ="row">
                  <div class = "col sm-3"><?php echo $text;?> <hr> <?php } ?> </div>
               </div>
               </p>
               </div>
             </div>
           </div>
        </div>

      </div>
    </div>

     <?php
include_once 'footer.php'
?>