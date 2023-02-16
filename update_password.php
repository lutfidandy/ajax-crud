<?php

$conn = mysqli_connect("localhost", "root", "", "school");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$current_password = $_POST['current_password'];
$new_password =  $_POST['new_password'];
$username = $_POST['username'];



// Get user's current password from database
$sql = "SELECT password FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$pass_old = $row['password'];

//encrypt current password
$md5_current_password = md5($username . $current_password);


// Check if current password is correct
if ($md5_current_password != $pass_old) {
    echo '<script language="javascript">
    alert ("Current password salah!");
    window.location="./";
    </script>';
    exit();

}else{
    $md5_new_password = md5($username . $new_password);
    $sql2 = "UPDATE admin SET password = '$md5_new_password' WHERE username = '$username'";
    $store = mysqli_query($conn, $sql2);
   if ($store){
    echo "Password updated successfully";
   }else{
    echo "Gagal update";
   }
    
}

?>
