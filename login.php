  <?php 
  
    require_once("Customers/includes/initialise.php");
    
    if(isset($_POST["subLogin"])) {
      
      $email = $_POST["loginEmail"];
      $pass = $_POST["loginPass"];
      $database->set_email($email);
      $database->set_password($pass);
      
      if($database->insert_to_login_table()) {
        
        $session->login($database->fetched_user_id);

        if($session->is_logged) {


            header("Location: manager.php");


        } else {

          $alert->message("Failed to Login","Fail");

        }
        
      } else {

        $alert->message("Failed to Login","Fail");

      }
    }
  
  ?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>BOOKAR</title>

  <link rel="SHORTCUT ICON" href="icon.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="Author" content="">
  <meta name="description" content="">

  <meta name="keywords" content="">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="Front End/node_modules/material-design-lite/material.min.css">
    <script src="Front End/node_modules/material-design-lite/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="Front End/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="Front End/e-shama.css" />
  
   <!-- Bootstrap core CSS -->
    <link href="Front End/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Front End/fontawesome-free-5.2.0-web/css/all.css">

</head>
<body >
     
      <div class="navbar navbar-expand-lg navbar-static-top" id="navigator" >
          <div class="container">

              <h2 class="navbar-brand brand-name">
                    <a href="index.php" class="pull-left"><img class="img-responsive2"       
                    src="Front End/Images/logo.png"> </a>
              </h2>

            <!-- <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggle-icon"></span>
            </button> -->


            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center;">
              <ul class="navbar-nav ml-auto menuBar navbar-right">

                <a class="nav-item menuItem" href="index.php" style="text-decoration: none; font-family: 'Josefin Slab'; color : #fff; font-size: 40px; padding: 30px;">
                  <li class="nav-link">HOME</li>
                </a>

              </ul>
              
            </div>


        </div>

  </div>

    <!--End Js slide-->

      <div class="d flex flex-column" id="shama_section">

          <div class="my-flex-item loginPanel">

              <form action="login.php" method="POST" id="loginForm">
                <p><input type="text" placeholder="Email" name="loginEmail" required></p>
                <p><input type="password" placeholder="Password" name="loginPass" required></p>
                <p><input type="submit" class="btn btn-primary" value="Login" name="subLogin"></p>
              </form>

          </div>

        </div>



<div class="mdl-grid" id="footer">

  <div class="mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone footer-data" id="footer-menu">

    <h2 style="text-align : center; color : #96980f; font-family: 'Josefin Slab';">Info</h2>
      <p>Book any car of your choice</p>
  </div>

</div>

    <script>

      $('.carousel').carousel({
        interval: 2000
      })

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="Front End/styling/script.js"></script>
    <script src="Front End/ShamaScript.js"></script>

    </script>
  <!--side bars-->

</body>
</html>




