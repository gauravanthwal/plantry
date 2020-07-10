<?php
session_start();

include "conn.php";
if($_SESSION['login']!=true){
header("location:index.php");
}
if (isset($_POST['submit'])) {
  
  $subject=$_POST["subject"];
  $detail=$_POST["detail"];
  $name=$_POST["name"];
  $filename=$_FILES["uploadfile"]["name"];
  $tempname=$_FILES["uploadfile"]["tmp_name"];

  $folder= "pic/".$filename;
  move_uploaded_file($tempname,$folder);

$subject_2=$_POST["subject_2"];
  $detail_2=$_POST["detail_2"];
  $filename_2=$_FILES["uploadfile_2"]["name"];
  $tempname_2=$_FILES["uploadfile_2"]["tmp_name"];
  
  $folder_2= "pic/".$filename_2;
  move_uploaded_file($tempname,$folder_2);

  $query= "INSERT INTO `plant_doctor_tab`(`picsource`,`subject`,`detail`,`name`,`subject_2`,`detail_2`,`picsorce_2`) VALUES ('$folder','$subject','$detail','$name','$subject_2','$detail_2','$folder_2')";
  $data= mysqli_query($con,$query);
  
}
?>
<?php  include 'header.php';  ?>
<section>
	<div class="container">
   
   <form action="" method="POST" enctype="multipart/form-data">
     <div ><label class="font-weight-bold">choose image:</label><input type="file" name="uploadfile" value="" class="form-control"></div>

<div><label class="font-weight-bold pt-3">insert main subject:</label><input type="text" name="subject" class="form-control"></div>

<div><label class="font-weight-bold pt-3">insert Details:</label><input type="text" name="detail" class="form-control"></div>

<div><label class="font-weight-bold pt-3">insert your name:</label><input type="text" name="name" class="form-control"></div>

<div><label class="font-weight-bold">choose second image:</label><input type="file" name="uploadfile_2" value="" class="form-control"></div>

<div><label class="font-weight-bold pt-3">insert second img subject:</label><input type="text" name="subject_2" class="form-control"></div>

<div><label class="font-weight-bold pt-3">insert Details:</label><input type="text" name="detail_2" class="form-control"></div>


     <div><input type="submit" name="submit" value="uploadfile" class="p-2 mt-3"></div>
   </form>

  </div>
</section>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


