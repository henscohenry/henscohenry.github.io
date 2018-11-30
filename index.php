<?php 

require_once("Customers/includes/initialise.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>BOOKAR</title>

  <link rel="SHORTCUT ICON" href="icon.ico" type="image/x-icon"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="Author" content="">
  <meta name="description" content="">

  <meta name="keywords" content="">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="Authentication/styles/css/font-awesome.min.css" />
    <link rel="stylesheet" href="Front End/node_modules/material-design-lite/material.min.css">
    <script src="Front End/node_modules/material-design-lite/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="Front End/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="Front End/e-shama.css" />
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	
	 <!-- Bootstrap core CSS -->
    <link href="Front End/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Front End/fontawesome-free-5.2.0-web/css/all.css"> 


</head>
<body >
     
      <div class="navbar navbar-expand-lg navbar-static-top" id="navigator" >
          <div class="container">


            <!-- <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggle-icon"></span>
            </button> -->


            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center;">
              <ul class="navbar-nav ml-auto menuBar navbar-right">

                <a class="nav-item menuItem" href="index.php" style="text-decoration: none; font-family: 'Josefin Slab'; color : #000; font-size: 40px; padding: 30px;">
                  <li class="nav-link">HOME</li>
                </a>

                <a class="nav-item menuItem" href="login.php" style="text-decoration: none; font-family: 'Josefin Slab'; color : #000; font-size: 40px; padding: 30px;">
                  <li class="nav-link">LOGIN</li>
                </a>

              </ul>
              

              
            </div>
            

        </div>

      </div>

        <div id="demo" class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
<!--                <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
              </ul> -->

             

              <div class="carousel-inner">
                 <div class="carousel-item slideImg active"><img src="Front End/Images/chevroletlight.png" /></div>
                 <!-- <div class="carousel-item slideImg "><img src="Front End/Images/PopinSlideRed.png" /></div> -->


              </div>
              

                <br/>
                      

                <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>  -->

                <!-- Left and right controls -->
<!--                   <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>   -->

          </div>
    <!--End Js slide-->

    <div class="d flex flex-column" id="shama_section">


          <div class="my-flex-item">

              <h2 style="text-align : center; color : #96980f; font-family: 'Josefin Slab';"></h2>

               <div class="mdl-grid" style="justify-content: center; ">
              

                    <?php 

                      $sql = $database->fetch_from_bookar_table();

                      foreach($sql as $row) {

                          $category = $row["Category"];
                          $bookarId = $row["BookarId"];
                          $ownerId = $row["OwnerId"];
                          $bookarName = $row["BookarName"];
                          $bookarDesc = $row["BookarDesc"];
                          $picPath = $row["PicPath"]; 
                          $bookarStock = $row["BookarStock"];
                          $bookarTotalSeats = $row["BookarSeatsTotal"];
                          $bookarPrice = $row["BookarPrice"];
                          $bookarLocation = $row["BookarLocation"];
                          $Date = $row["BookarDate"];
                         $Time = $row["BookarTime"];
             
                         

                    ?>
        
          <div class="card mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
             <div class="card-body">
             <h5 class="card-title"><?php echo $category; ?></h5>
             <img class="card-img-top" src="<?php echo $picPath; ?>" alt="" height="80px">
             <br/>
             <h6 class="card-title"><i><?php echo $bookarName; ?></i></h6>
            <h6 class="card-subtitle mb-2"><?php echo $bookarTotalSeats; ?> Seater| Ksh <?php echo $bookarPrice; ?> per day</h6>
             </div>

          </div>
          
          <?php 


                       }


                    ?>


                </div><!-- close of mdl-grid class div--> 

          </div>


    </div>

    <div class="modal" tabindex="-1" role="dialog" id="payModal" >

      <div class="modal-dialog" role="document">

        <div class="modal-content" >

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" >
                     <ul id="m-pesa_guide">
                         <li> Go to M-Pesa on your phone</li>

                       </ul>

                      <form action="bookar_pay.php" method="post" >

                         <div class="form-group">
                            <input type="number" class="form-control" placeholder="Days for booking car" name="seat_capacity">
                         </div>

                          <div class="form-group">
                           <input type="text" class="form-control" id="mpesa_code" name="mpesa_code" placeholder="Enter Transaction ID" required="required">
                          </div>

                         <div class="form-group">
                           <input type="hidden" class="form-control" id="bookar_id" name="bookar_id" required="required">
                         </div>
       
                         
                         <div class="form-group" >
                           <input type="text" class="form-control" id="buyer_email" name="buyer_email" placeholder="Enter a valid e-mail" required="required">
                         </div>
             
                         <div class="form-group">
                           <button type="submit" class="btn btn-primary" id="subMpesa" name="subMpesa">Complete</button>
                            <br>
                            
                         </div>

                     </form>
          </div>

          <div class="modal-footer">

          </div>

        </div>

      </div>

    </div>


<div class="mdl-grid" id="footer">

  <div class="mdl-cell--12-col mdl-cell--12-col-table mdl-cell--12-col-phone footer-data" id="footer-menu">

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
	
	 <!-- Bootstrap core JavaScript -->
    <script src="Front End/vendor/jquery/jquery.min.js"></script>
    <script src="Front End/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

    </script>
  <!--side bars-->
       
    <script>

         $(document).ready(function(){
          $('.modal').on('show.bs.modal', function(e) {

            var payId = $(e.relatedTarget).data('book-id');

            $(e.currentTarget).find('input[name="bookar_id"]').val(payId);

          });

        });

    </script>

</body>
</html>

