
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Add New Courses</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</head>
<body>
    

<h1  style = "text-align : center;">Welcome To Our New Courses Page</h1>


<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <!-- <h2 class="text-uppercase text-center mb-5">Create an account</h2> -->

              <form action ="#" method="POST" enctype="multipart/form-data"> 

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Course Name </label>
                  <input type="text" id="form3Example1cg"  name="coursename" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Teacher Name</label>
                  <input type="text" id="form3Example3cg"  name="teachername" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Ratting</label>

                  <input type="text" id="form3Example4cg" name="ratting"  class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Duration</label>

                  <input type="text" id="form3Example4cdg" name="duration" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Lectures</label>

                  <input type="text" id="form3Example4cdg" name="lectures" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Skill Level</label>

                  <input type="text" id="form3Example4cdg" name="skilllevel" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Language</label>

                  <input type="text" id="form3Example4cdg" name="language" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Price</label>

                  <input type="text" id="form3Example4cdg"  name="price"  class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Picture</label>

                  <input type="file" id="form3Example4cdg" name="pic" class="form-control form-control-lg" />
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit">Register</button>
                </div>


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

<?php
if(isset($_POST["submit"])){
      error_reporting(0);
      $Name = $_POST['coursename'];
      $TeacherName = $_POST['teachername'];
      $Ratting = $_POST['ratting'];
      $Duration = $_POST['duration'];
      $Lectures = $_POST['lectures'];
      $SkillLevel = $_POST['skilllevel'];
      $Language = $_POST['language'];
      $Price = $_POST['price'];
      $PictureName = $_FILES['pic']["name"];
      $PictureTmp = $_FILES['pic']["tmp_name"];



      $path = "./course/" . $PictureName;

      move_uploaded_file($PictureTmp,$path);

  
      $conn = mysqli_connect("localhost", "root", "", "education");         //hostname username password databasename
      if (!$conn) {
          echo "connection refuse";
      }
      $query = "INSERT INTO `course` (`ID`, `Name`, `TeacherName`, `Ratting`, `Duration`, `Lectures`, `SkillLevel`, `Language`, `Price`, `Picture`) VALUES (null,'$Name','$TeacherName','$Ratting','$Duration','$Lectures','$SkillLevel','$Language','$Price','$PictureName')";
      // $query = "insert into course values (null,'$Name',$TeacherName,'$Ratting','$Duration','$Lectures','$SkillLevel','$Language','$Price','$Picture')";
      $q = mysqli_query($conn, $query);
      if (!$q) {
          echo "query not exectired";
      } else {
          echo "query sucess"; 
      }
      header('Location:addcourses.php');
}
?>