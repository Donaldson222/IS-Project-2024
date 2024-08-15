<?php 

session_start();

//Register User
if (isset($_POST['regu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $type = $_POST['type'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];
 $mod = $_POST['mod'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if ($mod == 0) {
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`,`User_Type`, `Password`) VALUES ('$fname','$phone','$email','User',md5('$password'))";
     mysqli_query($conn, $sql);
  header("Location: index.html?userregistration=success");
  }else if($mod == 1){
  $sql = "INSERT INTO `users`(`Fullname`, `Phone_Number`, `Email_Address`, `User_Type`, `Password`) VALUES ('$fname','$phone','$email','$type',md5('$password'))";
     mysqli_query($conn, $sql);
  header("Location: index.php?userregistration=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}        

//Update User
if (isset($_POST['upu'])) {
 $fname = $_POST['fname'];
 $email = $_POST['email'];
 $uid = $_POST['uid'];
 $mod = $_POST['mod'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $passwordconfirm = $_POST['cpassword'];

 require_once 'dbconnection.inc.php';

 if ($password == $passwordconfirm) {
  if ($mod == 1) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index.php?updateadministrator=success");
  }else if ($mod == 2) {
  $sql = "UPDATE `users` SET `Fullname`='$fname',`Email_Address`='$email',`Phone_Number`='$phone',`Password`=md5('$password') WHERE `User_ID`='$uid'";
     mysqli_query($conn, $sql);
  header("Location: index1.php?updateuser=success");
  }
 }else{
  echo "Passwords do not match.";
 }
}

//Add A Vehicle
if (isset($_POST['addc'])) {
 $uid = $_SESSION['username'];
 $vname = $_POST['vname'];
 $vin = $_POST['vin'];
 $det = $_POST['det'];
 $pprice = $_POST['pprice'];
 $acc = $_POST['acc'];
 $sprice = $_POST['sprice'];
 $sr = $_POST['sr']; 
 $oh = $_POST['oh']; 

 require_once 'dbconnection.inc.php';

  if ($_FILES["image"]["error"] === 4) {
   echo "<script> alert('Image does not exist!'); </script>";
  }else{
  $uploads_dir = 'img';
  $fileName = $_FILES["image"]["name"];
  $fileSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (!in_array($imageExtension, $validImageExtension)) {
    echo "<script> alert('Invalid Image Format!'); </script>";
  }else if($fileSize > 10000000){
    echo "<script> alert('Image is too large!'); </script>";
  }else{

    $newImgName = uniqid();
    $newImgName .= '.' . $imageExtension;

    move_uploaded_file($tmpName, "$uploads_dir/$newImgName");

   $sql = "INSERT INTO `vehicles`(`VIN`, `User_ID`, `Name`, `Details`, `Purchase_Price`, `Sell_Price`, `Image`, `Accidents`, `Service_Records`, `Owner_History`) VALUES ('$vin','$uid','$vname','$det','$pprice','$sprice','$newImgName','$acc','$sr','$oh')";
     mysqli_query($conn, $sql);

  header("Location: index1.php?addvehicle=success");
 }
}
}

//Delete Functions


        if($_REQUEST['action'] == 'deleteV' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `vehicles` WHERE `VIN` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?deletspare=success");
        }

        if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `users` WHERE `User_ID` = '$deleteItem'";
        mysqli_query($conn, $sql); 
        header("Location: index.php?deleteuser=success");
        }

//Update Functions

        if($_REQUEST['action'] == 'updateVCo' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `vehicles` SET `Status`='Sold' WHERE `VIN`='$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?updatevehiclecompleted=success");
        }

        if($_REQUEST['action'] == 'updateVCa' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `vehicles` SET `Status`='Hidden' WHERE `VIN`='$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?updatevehiclecancelled=success");
        }

        if($_REQUEST['action'] == 'updateVP' && !empty($_REQUEST['id'])){ 
        require_once 'dbconnection.inc.php';
        $updateItem = $_REQUEST['id'];
        $sql = "UPDATE `vehicles` SET `Status`='Pending' WHERE `VIN`='$updateItem'";
        mysqli_query($conn, $sql); 
        header("Location: index1.php?updatevehiclepending=success");
        }        

 ?>