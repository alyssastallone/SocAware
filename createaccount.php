<?php
include_once 'header.php'
?>

    <div class="text-center">
    <form style = "max-width: 460px; margin:auto;">
        <img class="mt-4 mb-4" src="images/logo.png" width = "150" height = "150" alt="Logo">
        <h1 style=" font-family : Verdana, Geneva "; = "h3 mt-2 mb-1 font-weight-normal">Create Account</h1>

     <!-- Form that asks for first name, last name, email, username, password, birthday, gender-->  
     <form action="includes/signup.inc.php" method="post">

      <label for = "first name" class = "mb-2">First Name</label>
      <input type = "text" name="firstname" class="form-control" placeholder="First Name" required autofocus>

      <label for = "last name" class = "mb-2 mt-2">Last Name</label>
      <input type = "text" name = "lastname" class="form-control" placeholder="Last Name" required autofocus>

      <label for = "email" class = "mb-2 mt-2">Email Address</label>
      <input type = "email" name = "email" class="form-control" placeholder="Email Address" required autofocus>

      <label for = "username" class = "mb-2 mt-2">Username</label>
      <input type = "text" name = "username" class="form-control" placeholder="Username" required autofocus>

      <label for = "password" class = "mb-2 mt-2">Password</label>
      <input type = "password" name = "password" placeholder="Password" class="form-control" required autofocus>

            <!--for birthday form input (includes a calendar icon )-->
      <label for="birthday" class = "mb-2 mt-2">Birthday</label>
       <div class="input-group">
           <input class="form-control" id="date" name="birthday" placeholder="MM/DD/YYYY" type="text" required autofocus>
               <div class= "input-group-text"> <i class="fa fa-calendar"></i> </div>
             </div>

     <div class="form-group">
      <label for="gender" class = "mb-2 mt-2" >Gender</label>
      <select class="form-control" name="gender" id="genderselect" required autofocus>
        <option>Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Nonbinary</option>
        <option>Prefer Not to Answer</option>
      </select>
    </div>

    <?php
if (isset($_GET["error"])) {
  if($_GET["error"] == "emptyInput") {
    echo "<p>Please fill in all required fields</p>";
  }
  else if ($_GET["error"] == "infoExists") {
    echo "<p>The username or email you entered is already in use.</p>";
  }
  else if ($_GET["error"] == "none") {
    echo "<p>Successfully signed up</p>";
  }

}
?>

     <div class = "mt-4 mb-3">
      <!-- Will need to ADD LINK for this -->     
     <button type="submit" name="submit" class="btn btn-lg btn-secondary btn-block" >Create Account</button>
     <div class ="mt-4">
   <label for = "have-account" class="sr-only">Already Have an Account?</label>
   <div class = "mt-3 mb-5">
      <!--Use the <a /a> for adding link to log in button and redirect to log in page--> 
  <a href=index.php class = "btn btn-secondary btn-block" role = "button" >Log In</a>
   </div>
 </div>
 </form>
 </div>
      
    </form>
    </div>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<!-- for date choose for birthday form input -->
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<!-- Need to add some error handling below-->

<?php
if (isset($_GET["error"])) {
  if($_GET["error"] == "emptyInput") {
    echo "<p>Please fill in all required fields</p>";
  }
  else if ($_GET["error"] == "infoExists") {
    echo "<p>The username or email you entered is already in use.</p>";
  }
  else if($_GET["error"] == "none") {
    echo "<p>Successfully signed up</p>";
  }

}
?>

<?php
include_once 'header.php'
?>