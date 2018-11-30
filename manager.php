<?php

    require_once("Customers/includes/initialise.php");

    if($session->is_logged) {

      $database->get_session_details($session->session_id); 

      //echo $database->session_user_id;

        if(isset($_POST["submit_bookar"])) {
                  $bk_category = $_POST["bk_category"];
                  $bk_name = $_POST["bk_name"];
                  $bk_location = $_POST["bk_location"];
                  $bk_description = $_POST["bk_description"];
                  $bk_capacity = $_POST["bk_capacity"];
				  $bk_no_seats = $_POST["bk_no_seats"];
                  $bk_price = $_POST["bk_price"];
                  /* $bk_start_date = $_POST["bk_start_date"];
                  $bk_start_time = $_POST["bk_start_time"];
                      $bk_start_time_format =date("H:i:s",strtotime($bk_start_time));
                  $bk_stop_date = $_POST["bk_stop_date"];
                  $bk_stop_time = $_POST["bk_stop_time"];
                      $bk_stop_time_format =date("H:i:s",strtotime($bk_stop_time)); */

                  $upload->set_photo_name($_FILES["file_upload"]["name"]);
                  $upload->set_file_type($_FILES["file_upload"]["type"]);
                  $upload->set_tmp_loc($_FILES["file_upload"]["tmp_name"]);
                  $upload->set_file_error($_FILES["file_upload"]["error"]);
                  
                  if($upload->validate_image()) {
					  
                    $automation->generate_bookar_id();
                    
                   $database->set_bk_category($bk_category);
                    $database->set_bk_id($automation->bk_id);
                    $database->set_user_id($database->session_user_id);
                    $database->set_bk_name($bk_name);
                    $database->set_bk_description($bk_description);
                    $database->set_bk_stock($bk_capacity);
					$database->set_bk_no_seats($bk_no_seats);
                    $database->set_bk_photo_path($upload->Object_path);
                    $database->set_bk_price($bk_price);
                    $database->set_bk_location($bk_location);
					$database->set_bk_vacancy("Vacant");
                    
                    if($database->insert_to_bookar_table()) {
                       $alert->message("Bookar Uploaded","Success");
                    } else {
                       $alert->message("Failed to Upload Bookar","Fail");
                    }
                    
                  }

          }
		  
		  

          if(isset($_POST["confirmTicket"])) {
   
            $ticketN = $_POST["ticketNo"]; 

            if($ticket->update_ticket_status($ticketN)) {
              $alert->message("Ticket Confirmed","Success");
            } else {
              $alert->message("Ticket Confirmation Failed","Fail");
            }

          }

      
    } else {

        header("Location: index.php");
  
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
                    <a href="manager.php" class="pull-left"><img class="img-responsive2"       
                    src="Front End/Images/logo.png"> </a>
              </h2>

            <!-- <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggle-icon"></span>
            </button> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center;">
              <ul class="navbar-nav ml-auto menuBar">

                <a class="nav-item menuItem" href="manager.php" style="text-decoration: none; font-family: 'Josefin Slab'; color : #96980f; font-size: 40px; padding: 30px;">
                  <li class="nav-link">HOME</li>
                </a>

              </ul>
              
            </div>


        </div>

      </div>

    <!--End Js slide-->

      <div class="d flex flex-column" id="shama_section">

        <h1 style="text-align : center; color : #96980f; font-family: 'Josefin Slab';">MANAGER <?php echo strtoupper($database->session_username); ?></h1>

          <div class="my-flex-item managementContent">



              <div id="sidebar">
                <ul id="managementTab">
                  <li onclick="show_ticket_panel()">Online Reservations</li>
                </ul><!-- end of managementTab ul -->
              </div><!-- end of sidebar div-->

              <div id="ticketPanel">
                                    

                    <h2 style="text-align : center; color : #000; font-family: 'Josefin Slab';">UPLOAD CAR</h2>

                      <form id="uploadProductForm" action="manager.php" method="POST" enctype="multipart/form-data">
                        <p><select name="bk_category" class="form-control">
                          <option>BMW</option>
                          <option>TOYOTA</option>
                          <option>NISSAN</option>
                         
                        </select></p>

                        <p><input class="form-control" type="text" name="bk_name" placeholder="Bookar Name" required></p>  
            
                        <p><input class="input-group" type="file" aria-describedby="bk_poster" name="file_upload" accept="image/*" required></p>

                        <p><input class="form-control" type="number" name="bk_capacity" placeholder="Enter Number Of Cars Available" required></p>
               
                        <p><input class="form-control" type="number" name="bk_price" placeholder="Enter Price Per Day" required></p>
            
                        <p><input class="form-control" type="number" name="bk_no_seats" placeholder="Enter Number Of Seats" required></p>
            
                        <p><input class="form-control" type="text" name="bk_location" placeholder="Enter Location" required></p>

                        <p><textarea class="form-control" rows="4" cols="20" name="bk_description" placeholder="description"></textarea></p>

                        <p><input type="submit" value="Upload Vehicle" name="submit_bookar" class="btn btn-primary" ></p>

                      </form>

                       <div id="managerProducts">
                    
                                 <div class="mdl-grid" style="justify-content: center; ">
                      

                              <div class="mdl-cell--4-col mdl-cell--2-col-tablet mdl-cell--3-col-phone" style="margin-left: 10px; margin-top: 10px;">

                                    <a href="bookar/BMW.php" style="text-decoration: none; font-family: 'Josefin Slab';"><div class="category">BMW</div></a>

                              </div><!-- close of card class div-->
                              
                              <div class="mdl-cell--4-col mdl-cell--2-col-tablet mdl-cell--3-col-phone" style="margin-left: 10px; margin-top: 10px;">

                                    <a href="bookar/toyota.php" style="text-decoration: none; font-family: 'Josefin Slab';"><div class="category">TOYOTA</div></a>

                              </div><!-- close of card class div-->
                                               
                              <div class="mdl-cell--4-col mdl-cell--2-col-tablet mdl-cell--3-col-phone" style="margin-left: 10px; margin-top: 10px;">

                                    <a href="bookar/nissan.php" style="text-decoration: none; font-family: 'Josefin Slab';"><div class="category">NISSAN</div></a>

                              </div><!-- close of card class div-->


                        </div><!-- close of mdl-grid class div--> 
                      

                    </div><!-- end of managerProducts div -->


              </div><!-- end of ticketPanel div-->


			  
		 </div>
			  

          </div>

    </div>



<div class="mdl-grid" id="footer">

  <div class="mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone footer-data" id="footer-menu">

    <h2 style="text-align : center; color : #96980f; font-family: 'Josefin Slab';">Info</h2>
      <p>Book any car of your choice</p>
  </div>

</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="Front End/styling/script.js"></script>
    <script src="Front End/scripting/bookar.js"></script>
	
	<!-- Bootstrap core JavaScript -->
    <script src="Front End/vendor/jquery/jquery.min.js"></script>
    <script src="Front End/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </script>

    <script>
      function searchAllTickets() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("searchTicket");
        filter = input.value.toUpperCase();
        table = document.getElementById("ticketTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          td2 = tr[i].getElementsByTagName("td")[1];
          td3 = tr[i].getElementsByTagName("td")[2];
          if (td || td2 || td3) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

      function searchPayments() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("searchPay");
        filter = input.value.toUpperCase();
        table = document.getElementById("payTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          td2 = tr[i].getElementsByTagName("td")[1];
          td3 = tr[i].getElementsByTagName("td")[2];
          if (td || td2 || td3) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

    </script>
  <!--side bars-->
      
</body>
</html>




