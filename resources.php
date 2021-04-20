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

  // Close the database connection
  mysqli_close($conn);
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
             ?></h3>
           </div>
         </div>

         <!-- area where resource list will start -->

         <div class = "col-lg-7 shadow p-4 mb-4 mx-5 bg-white" style = "background-color:snow">
            <div class="jumbotron">
             <h3 class="display-8">Resources</h3>
             <hr class="my-4">
             <div class="d-flex">
             <div class = "grid">
             <div class = "row">
              <h5 class = "display-9">Covid News and Info:</h5>

        <!-- Covid info section -->

              <ul class="list-group list-group-flush">
              <a href="https://covid.cdc.gov/covid-data-tracker/#datatracker-home" class ="list-group-item">Covid Data Tracker</a>
              <a href="https://www.npr.org/sections/health-shots/2020/09/01/816707182/map-tracking-the-spread-of-the-coronavirus-in-the-u-s"
                 class ="list-group-item">Case Tracker by State</a>
              <a href="https://www.cdc.gov/vaccines/covid-19/reporting/vaccinefinder/about.html" class ="list-group-item">Vaccine Information and Locations</a>
              </ul>

               <!-- News Section -->
               
               <h5 class = "display-9 mt-3 mb-1">Current Events:</h5>
               <ul class="list-group list-group-flush">
              <a href="https://www.cnn.com/world" class ="list-group-item">CNN News</a>
              <a href="https://abcnews.go.com/" class ="list-group-item">ABC News</a>
              <a href="https://www.usnews.com/" class ="list-group-item">US News</a>
              <a href="https://news.google.com/" class ="list-group-item">Google News</a>
              </ul>

              <!-- Charities? section idk -->
               
              <h5 class = "display-9 mt-3 mb-1">Charity Info:</h5>
               <ul class="list-group list-group-flush">
              <a href="https://wck.org/" class ="list-group-item">World Central Kitchen: Covid Relief</a>
              <a href="https://www.actionagainsthunger.org/" class ="list-group-item">Action Against Hunger</a>
              <a href="https://www.americanhumane.org/" class ="list-group-item">American Human: Animal Charity</a>
              <a href="https://www.awf.org/" class ="list-group-item">African Wildlife Foundation</a>
              <a href="https://www.cancerresearch.org/" class ="list-group-item">Cancer Research Institute</a>
              <a href="https://reproductiverights.org/" class ="list-group-item">Center for Reproductive Rights</a>
              <a href="https://www.globalfundforwomen.org/" class ="list-group-item">Global Fund For Women</a>
              <a href="https://www.thetrevorproject.org/" class ="list-group-item">The Trevor Project: LGBTQ+ Support</a>
              <a href="https://endhomelessness.org/" class ="list-group-item">National Alliance to End Homelessness</a>
              </ul>


            
              </div>
              </div>
             </div>
           </div>
        </div>

      </div>
    </div>

       </div>
    

     </div>


<?php
include_once 'footer.php'
?>