<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- FontAwesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>SocAware</title>

  </head>
  <body style = "background-color:rgb(207, 185, 248)">
    
   <nav class = "navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
      <img src="images/logo.png" class="img-fluid" width = "55" height = "55">
      <?php
      if (isset($_SESSION["username"])) {
       echo'<a class = "navbar-brand me-auto" href="/timeline.php">SocAware</a>';
      }
       else {
       echo '<a class = "navbar-brand me-auto" href="#">SocAware</a>';
       }
      ?>  
       <?php
        if (isset($_SESSION["username"]))
        {
          echo '<div class="navbar-nav">
                  <ul class="navbar-nav">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                   </button>
               <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                 <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Create Post</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="/textpost.php">Text</a></li>
                            <li><a class="dropdown-item" href="/picpost.php">Picture</a></li>
                            <li><a class="dropdown-item" href="/vidpost.php">Video</a></li>
                        </ul>
                     </li>
                </ul>
              </div>
    
    
              <li class="nav-item active">
                <a class = "nav-link" href="/resources.php">Resources</a>
              </li>
    
           </ul>
    
          <ul class="navbar-nav ml-auto">
            <li class = "nav-item">
              <a class="nav-link" href="/profile.php">
                <i class="fa fa-user fa-fw"></i>Profile<br>
              </a>
            </li>

            <li class="nav-item active">
            <a class="nav-link" href="includes/logout.inc.php">Logout</a>
            </li>
    
          </ul>';

        }
        else{
          echo '<div class="navbar-nav px-2">
          <ul class="navbar-nav ml-auto">
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <li class="nav-item active">
          <a class="nav-link px-2" href="/index.php" >Sign In</a>
         </li>
         <li class="nav-item active">
         <a class="nav-link px-4" href="/createaccount.php">Sign Up</a>
         </li>
         </div>';
        }
       ?>

   <!-- text modal -->
  <div class="modal fade" id="textmodal" tabindex="-1" role="dialog" aria-labelledby="textmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    </div>
     </nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
  </body>
</html>
