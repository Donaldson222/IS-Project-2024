<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['adminname'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['adminname'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gari Poa - Administrator Homepage</title>

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
        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

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
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="#rep" class="nav-item nav-link">Reports</a>
                            <a href="#func" class="nav-item nav-link">Functions</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="logout.php">Logout</a>
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
                            <h1>Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h1>
                            <a class="btn btn-custom" href="#rep">My Reports</a>
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
                            <p>My Reports</p>
                                                        <h2>List of Users</h2>
                            <br>
                        </div>
                                               <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">User ID</th>
<th style="text-align: left;
  padding: 8px;">Fullname</th>
  <th style="text-align: left;
  padding: 8px;">Email Address</th>
 <th style="text-align: left;
  padding: 8px;">Phone Number</th>
  <th style="text-align: left;
  padding: 8px;">User Type</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$sql = "SELECT `User_ID`, `Fullname`, `Phone_Number`, `Email_Address`, `User_Type` FROM `users`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["User_ID"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>
<td><?php echo($row["Email_Address"]); ?></td>
<td><?php echo($row["Phone_Number"]); ?></td>
<td><?php echo($row["User_Type"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this user?')?window.location.href='insertion.inc.php?action=deleteU&id=<?php echo($row["User_ID"]); ?>':true;" title='Delete User'>Delete</button></td>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
<br>
                            <a class="btn btn-custom" onclick="printData();">Print</a>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-12">
                                              <div class="section-header text-left">
                                                        <h2>List of Vehicles</h2>
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
    <th style="text-align: left;
  padding: 8px;">Status</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$sql = "SELECT `vehicles`.`VIN`, `vehicles`.`VID`, `vehicles`.`User_ID`, `vehicles`.`Name`, `vehicles`.`Details`, `vehicles`.`Purchase_Price`, `vehicles`.`Sell_Price`, `vehicles`.`Image`, `vehicles`.`Accidents`, `vehicles`.`Service_Records`, `vehicles`.`Owner_History`, `vehicles`.`Status`, `users`.`Fullname`, `users`.`Phone_Number`, `users`.`Email_Address` FROM `vehicles` JOIN `users` ON `vehicles`.`User_ID` = `users`.`User_ID`";
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
<td><img src="img/<?php echo($row["Image"]); ?>" title="<?php echo($row["Name"]); ?>" style="width: 250px;"></td>
<td><?php echo($row["Accidents"]); ?></td>
<td><?php echo($row["Service_Records"]); ?></td>
<td><?php echo($row["Owner_History"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<?php
if(isset($_SESSION['username'])){
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this vehicle?')?window.location.href='insertion.inc.php?action=deleteV&id=<?php echo($row["VID"]); ?>':true;" title='Delete Vehicle'>Delete</button></td>
<?php
if($row["Status"] == "Pending"){
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to hide this vehicle?')?window.location.href='insertion.inc.php?action=updateVCa&id=<?php echo($row["VID"]); ?>':true;" title='Hide Vehicle'>Hide</button></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to sale this vehicle?')?window.location.href='insertion.inc.php?action=updateVCo&id=<?php echo($row["VID"]); ?>':true;" title='Sale Vehicle'>Sale</button></td>
<?php
}else{
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to unhide this vehicle?')?window.location.href='insertion.inc.php?action=updateVP&id=<?php echo($row["VID"]); ?>':true;" title='Unhide Vehicle'>Unhide</button></td>
<?php
}
?>
<?
<?php
}
?>
</tr>
<?php
}
} else { echo "No results"; }
?>

</table>
<br>
<br>
                            <a class="btn btn-custom" onclick="printData1();">Print</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Reports End -->
        
        <div class="col-lg-5">
        <div class="location-form">
            <h3>Add A Vehicle</h3>
            <form action="insertion.inc.php" method="POST" enctype="multipart/form-data">
                <div class="control-group">
                <input type="text" name="vin" class="form-control" placeholder="VIN" required="required" />
                </div>
                <div class="control-group">
                <input type="text" name="vname" class="form-control" placeholder="Vehicle Name" required="required" />
                </div>
                <div class="control-group">
                <input type="number" name="pprice" class="form-control" placeholder="Purchase Price in kshs." required="required" />
            </div>
                <div class="control-group">
                <input type="number" name="sprice" class="form-control" placeholder="Selling Price in kshs." required="required" />
            </div>
                                                <div class="control-group">
                                                  <label style="color: white;">Vehicle Image:</label>
                    <input type="file" name="image" class="form-control" accept=".jpg, .png, .jpeg" required="required" />
                </div>                             
                <div class="control-group">
                    <textarea class="form-control" name="det" placeholder="Vehicle Details..." required="required"></textarea>
                </div>
                <div class="control-group">
                <textarea class="form-control" name="acc" placeholder="Accident Details..." required="required"></textarea>
                </div>
                <div class="control-group">
                    <textarea class="form-control" name="sr" placeholder="Vehicle Service Records..." required="required"></textarea>
                </div>
                <div class="control-group">
                    <textarea class="form-control" name="oh" placeholder="Vehicle Ownership History..." required="required"></textarea>
                </div>
                <div>
                    <button class="btn btn-custom" type="submit" name="addc">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
        
        <!-- My Functions Start -->
        <div class="location" id="func">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>My Functions</p>
                        </div>
                        <div class="row">
                        <div class="location-form">
                            <h3>Update My Details</h3>
                            <form action="insertion.inc.php" method="POST">
                                <div class="control-group">
                                <input type="text" name="fname" class="form-control" placeholder="Fullname" value="<?php echo $row1['Fullname']; ?>" required="required" />
                                <input type="hidden" value="1" required name="mod">
                                <input type="hidden" value="<?php echo $filter; ?>" required name="uid">
                                </div>
                                <div class="control-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $row1['Email_Address']; ?>" required="required" />
                                </div>
                                <div class="control-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $row1['Phone_Number']; ?>" required="required" />
                            </div>
                                                                <div class="control-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                                </div>
                                                                <div class="control-group">
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="required" />
                                </div>                               
                                <div>
                                    <button class="btn btn-custom" type="submit" name="upu">Update</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="location-form">
                            <h3>Register</h3>
                            <form action="insertion.inc.php" method="POST">
                                <div class="control-group">
                                <input type="text" name="fname" class="form-control" placeholder="Fullname" required="required" />
                                <input type="hidden" value="1" required name="mod">
                                </div>
                                <div class="control-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required="required" />
                                </div>
                                <div class="control-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required="required" />
                            </div>
                            <div class="control-group">
                              <select name="type" class="form-control" required="required">
                                <option value="" disabled selected>Select A User Type</option>
                                <option value="Administrator">Administrator</option>
                                <option value="User">User</option>
                              </select>
                            </div>
                                                                <div class="control-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                                </div>
                                                                <div class="control-group">
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="required" />
                                </div>                               
                                <div>
                                    <button class="btn btn-custom" type="submit" name="regu">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Functions End -->


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
                            <a href="#rep">My Reports</a>
                            <a href="#func">My Functions</a>
                            <a href="logout.php">Logout</a>
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