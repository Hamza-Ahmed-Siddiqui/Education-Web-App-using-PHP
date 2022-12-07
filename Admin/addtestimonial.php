<?php
include_once("conn.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Add New Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</head>
<body>
    

     <div>
        <?php
 
    // include_once("navheader.php");
     ?>  
        </div>

<h1  style = "text-align : center;">Welcome To Our Add New Testimonial Page</h1>



<!--  =========================== Add Teachers Form ============================== -->

<form action ="#" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text"  name= "txtname" class="form-control"  aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" name="txtdescription" class="form-control" >
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Course</label>
    <input type="text" name="txtcourse" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Picture</label>
    <input type="file" class="form-control"  name="pic" >
  </div>


  
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
</form>




</body>
</html>

<?php
if(isset($_POST["submit"])){
    // error_reporting(0);
    $Name = $_POST['txtname'];
    $Description = $_POST['txtdescription'];
    $Course = $_POST['txtcourse'];
    $PictureName = $_FILES['pic']["name"];
    $PictureTmp = $_FILES['pic']["tmp_name"];
    


    $path = "./course/" . $PictureName;

    move_uploaded_file($PictureTmp,$path);

    $conn = mysqli_connect("localhost", "root", "", "education");         //hostname username password databasename
    if (!$conn) {
        echo "connection refuse";
    }

    // $query = "insert into teachers values (null,'$Name',$Expertise,'$Experience','$Picture')";
    $query = "INSERT INTO `testimonial`(`ID`, `Name`, `Description`, `Course`, `Picture`) VALUES (null,'$Name','$Description','$Course','$PictureName')";
    $q = mysqli_query($conn, $query);
    if (!$q) {
        echo "query not exectired";
    } else {
        echo "query sucess";
        
    }
    header('Location:addteacher.php');
  }
?>