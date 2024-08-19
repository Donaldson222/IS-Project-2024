<?php
require_once 'dbconnection.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gari Poa - View Vehicles</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website" name="keywords">
        <meta content="Free Website" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>Gari <span>Poa</span></h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-6">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+254 712 345678</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>garipoa@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="index.html" class="nav-item nav-link">About</a>
                            <a href="index.html" class="nav-item nav-link">Service</a>
                            <a href="vehicles.php" class="nav-item nav-link">Vehicles</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="index.html">Get Started</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/h1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Gari-Poa</h3>
                            <h1>We Aid in Used Car Purchase and Combat Fraudsters</h1>
                            <a class="btn btn-custom" href="index.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

           <!-- My Reports Start -->
        <div class="about" id="rep">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                                              <div class="section-header text-left">
                            <p>View Vehicles</p>
                                                        <h2>Available Vehicles</h2>
                            <br>
                        </div>
<input type="text" class="form-control input-sm" id="myInput" onkeyup="searchList();" placeholder="Search By Vehicle Name or VIN..."/>
               <br>
                                               <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">VIN</th>
<th style="text-align: left;
  padding: 8px;">Vehicle Name</th>
<th style="text-align: left;
  padding: 8px;">User Details</th>
  <th style="text-align: left;
  padding: 8px;">Prices</th>
 <th style="text-align: left;
  padding: 8px;">Image</th>
  <th style="text-align: left;
  padding: 8px;">Accidents</th>
    <th style="text-align: left;
  padding: 8px;">Service Records</th>
    <th style="text-align: left;
  padding: 8px;">Owner History</th>
</tr>

<?php
$sql = "SELECT `vehicles`.`VIN`, `vehicles`.`User_ID`, `vehicles`.`Name`, `vehicles`.`Details`, `vehicles`.`Purchase_Price`, `vehicles`.`Sell_Price`, `vehicles`.`Image`, `vehicles`.`Accidents`, `vehicles`.`Service_Records`, `vehicles`.`Owner_History`, `vehicles`.`Status`, `users`.`Fullname`, `users`.`Phone_Number`, `users`.`Email_Address` FROM `vehicles` JOIN `users` ON `vehicles`.`User_ID` = `users`.`User_ID` WHERE `vehicles`.`Status` = 'Pending'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["VIN"]); ?></td>   
<td><?php echo($row["Name"]); ?></td>
<td><?php echo($row["Fullname"]); ?> reach out on <?php echo($row["Email_Address"]); ?> or <?php echo($row["Phone_Number"]); ?>.</td>
<td>Purchased @ <?php echo($row["Purchase_Price"]); ?> kshs., Sold @ <?php echo($row["Sell_Price"]); ?> kshs.</td>
<td><img src="img/<?php echo($row["Image"]); ?>" title="<?php echo($row["Name"]); ?>" style="width: 150px;"></td>
<td><?php echo($row["Accidents"]); ?></td>
<td><?php echo($row["Service_Records"]); ?></td>
<td><?php echo($row["Owner_History"]); ?></td>
</tr>
<?php
}
} else { echo "No results"; }

?>

</table>
<br>
<br>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Reports End -->


        <!-- Footer Start -->
        <div class="footer" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Nairobi, KENYA</p>
                            <p><i class="fa fa-phone-alt"></i>+254 712 345678</p>
                            <p><i class="fa fa-envelope"></i>garipoa@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-link">
                            <h2>Important Links</h2>
                            <a href="index.html">About Us</a>
                            <a href="#contact">Contact Us</a>
                            <a href="index.html">Our Service</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <p>&copy; <a href="#">Gari-Poa</a>.</p>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>

        <!-- Javascript -->
        <script src="js/main.js"></script>
                <script type="text/javascript">
function searchList() {
  var input, filter, table, tr, td, i, j, txtValue, found;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("printTable1");
  tr = table.getElementsByTagName("tr");

  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none"; 
    td = tr[i].getElementsByTagName("td");
    found = false;

    for (j = 0; j < 2; j++) { 
      if (td[j]) {
        txtValue = td[j].textContent || td[j].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          found = true;
          break; 
        }
      }
    }

    if (found) {
      tr[i].style.display = "";
    }
  }
}
</script>
    </body>
</html>
