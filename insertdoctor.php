<?php
require_once("includes.html");

function calculateAge($dob) {
    $dob = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dob)->y;
    return $age;
}

function newdoctor()
{
  include "DBconnect.php";
  $did = $_POST['did'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $specialisation = $_POST['specialisation'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $region = $_POST['region'];

  
  $age = calculateAge($dob);


  if ($age < 18) {
    echo "<script>
    swal({ 
      title: 'Error!',
      text: 'Age should be 18 or more',
      type: 'error' 
      },
      function(){
        window.location.href = 'NewDoctor.php';
      });
      </script>";
    return; 
  }

  
  if (strlen($contact) != 10) {
    echo "<script>
    swal({ 
      title: 'Error!',
      text: 'Contact number should be 10 digits',
      type: 'error' 
      },
      function(){
        window.location.href = 'NewDoctor.php';
      });
      </script>";
    return; 
  }

  $sql = "INSERT INTO doctor(DID,name,gender,dob,specialisation,contact,address,username,password,region) VALUES('$did','$name','$gender','$dob','$specialisation','$contact','$address','$username','$password','$region')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>
    swal({ 
      title: 'Successful!',
      text: 'DOCTOR ADDED SUCCESSFULLY',
      type: 'success' 
      },
      function(){
        window.location.href = 'NewDoctor.php';
      });
      </script>";
  } else {   
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

function checkdid()
{
 include 'DBconnect.php';
 $did = $_POST['did'];
 $sql = "SELECT * FROM doctor WHERE DID = '$did'";

 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) != 0)
 {
   echo "<script>
   swal({ 
     title: 'DID ALREADY EXISTS!!',
     text: 'Choose another DID',
     type: 'error' 
     },
     function(){
       window.location.href = 'NewDoctor.php';
     });
     </script>";
 }
 else 
   if(isset($_POST['submit']))
   { 
     newdoctor();
   }
}

function checkusername()
{   
 include 'DBconnect.php';
 $username = $_POST['username'];
 $sql = "SELECT * FROM doctor WHERE username = '$username'";

 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) != 0)
 {
   echo "<script>
   swal({ 
     title: 'Username already exists!!',
     text: 'Try with another username',
     type: 'error' 
     },
     function(){
       window.location.href = 'NewDoctor.php';
     });
     </script>";
 }
 else 
   if(isset($_POST['submit']))
   { 
     checkdid();
   }
}

if(isset($_POST['submit']))
{
 checkusername();
}
?>
