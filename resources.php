<?php
include_once 'header.php'
?>

     <!--add new container profile-->
     <div class = "container mb-5">
       <div class="row">
         <div class="col-md-3">
           <div class="card-body text-center shadow p-4 mb-4 bg-white">
             <img src="images/sample-profile.png" class="rounded-circle" class="img-fluid" max-width= 100%>
             <h3 class="card-title mt-2">Sample User</h3>
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
              <a href="https://www.cnn.com/world" class ="list-group-item">World News</a>
              <a href="" class ="list-group-item">More News</a>
              <a href="" class ="list-group-item">Even More News</a>
              </ul>

              <!-- Charities? section idk -->
               
              <h5 class = "display-9 mt-3 mb-1">Charity Info:</h5>
               <ul class="list-group list-group-flush">
              <a href="" class ="list-group-item">Fill In Here</a>
              <a href="" class ="list-group-item">Fill In Here</a>
              <a href="" class ="list-group-item">Fill In Here</a>
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