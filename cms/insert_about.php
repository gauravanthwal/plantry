
<?php
include 'conn.php';
if (isset($_POST['send'])) {
	
$subject=$_POST["subject"];
$details1=$_POST["details1"];
$details2=$_POST["details2"];
$details3=$_POST["details3"];
$adddetails=$_POST["adddetails"];
$adddetails2=$_POST["adddetails2"];

 $filename=$_FILES["uploadfile1"]["name"];
  $tempname=$_FILES["uploadfile1"]["tmp_name"];

  $folder= "pic/".$filename;
  move_uploaded_file($tempname,$folder);

   $filename_2=$_FILES["uploadfile2"]["name"];
  $tempname_2=$_FILES["uploadfile2"]["tmp_name"];

  $folder_2= "pic/".$filename_2;
  move_uploaded_file($tempname_2,$folder_2);


$q="INSERT INTO `about_cms`(`subject`, `details1`, `details2`, `details3`,`adddetails`,`adddetails2`,`pic_sorce`,`pic_sorce_2`) VALUES ('$subject','$details1','$details2','$details3','$adddetails','$adddetails2','$folder','$folder_2')";
$query=mysqli_query($con,$q);

}
?>

<?php include 'header.php';
?>
<section>
	<div>
		<div class="container">
			<h2 class="text-warning display-4 p-3">this is about page form:</h2>
			<form method="POST" enctype="multipart/form-data">
				<div class="p-4 font-weight-bold"><label>enter the subject:</label><input type="text" name="subject" placeholder="only 20 latter enter Here" class="form-control p-3">
			</div>
			<div class="p-4 font-weight-bold"><label>enter the details1:</label><input type="text" name="details1" placeholder="only 254 latter enter Here" class="form-control p-5">
			</div>
			<div class="p-4 font-weight-bold"><label>enter the details2:</label><input type="text" name="details2" placeholder="only 254 latter enter Here" class="form-control p-5">
			</div>
			<div class="p-4 font-weight-bold"><label>enter the details3:</label><input type="text" name="details3" placeholder="only 254 later enter Here" class="form-control p-5">
			</div>
				<div>
				<h3 class="text-warning display-4 p-3">this is google-addsense side post</h3>
<div><label class="font-weight-bold">choose add image:</label><input type="file" name="uploadfile1" value="" class="form-control"></div>
<div class="p-4 font-weight-bold"><label>enter the details</label><input type="text" name="adddetails" placeholder="only 254 latter enter Here" class="form-control p-5"></div>

<div><label class="font-weight-bold">choose add image:</label><input type="file" name="uploadfile2" value="" class="form-control"></div>
<div class="p-4 font-weight-bold"><label>enter the details</label><input type="text" name="adddetails2" placeholder="only 254 latter enter Here" class="form-control p-5"></div>

			<div>	
			<button class="btn btn-lg btn-danger" name="send">submit</button></div>
		</form>
	</div>
</div>
</section>
</body>
</html>