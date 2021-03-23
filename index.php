<?php
include_once 'header.php'
?>
    
    <div class="text-center">
    <form style = "max-width: 480px; margin:auto;" action = "/includes/login.inc.php" method="post">
        <img class="mt-4 mb-4" src="images/logo.png" width = "150" height = "150" alt="Logo">
        <h1 style=" font-family : Verdana, Geneva "; = "h3 mt-2 mb-3 font-weight-normal">Please Log In</h1>

    <div class = "mt-4 mb-4">
      <label for = "username" class = "sr-only"></label>
      <input type = "username" name = "username" id = "username" class="form-control" placeholder="Username" required autofocus>
</div>
      <label for = "password" class = 'sr-only'></label>
      <input type = "password" name = "password" id = "password" placeholder="Password" 
      class="form-control">

      <div class="checkbox mt-3">
         <label>
           <input type = "checkbox"
           value = "remember-me"> Remember Me?
         </label>
      </div>
      <div class = "mt-3">


         <!-- Will need to ADD LINK for this -->     
        <button class="btn btn-lg btn-secondary btn-block"
        >Sign In</button>
        <div class ="mt-4">
      <label for = "need-account" class="sr-only">Don't Have an Account?</label>
      <div class = "mt-3">
         <!--Use the <a /a> for adding link to sign up button--> 
     <a href=createaccount.php class = "btn btn-secondary btn-block"
     role = "button">Sign Up</a>
      </div>
    </div>
    </form>
    </div>

<?php
include_once 'footer.php'
?>
