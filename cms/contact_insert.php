<?php
include 'conn.php';
if (isset($_POST['send'])){
$detail=$_POST['detail'];
$address=$_POST['address'];
$email=$_POST['email'];
$websit=$_POST['websit'];

$q = "INSERT INTO `contact_cms`(`detail`, `address`, `email`, `website`) VALUES ('$detail','$address','$email','$websit') ";
$query = mysqli_query($con,$q);

}
?>

<?php include 'header.php';  ?>

<section>
	<div class="container">
		<h3 class="text-success text-center p-3">insert contact details:</h3>

		<form method="POST" class="font-weight-bold">
			<div><label>details:</label><input type="text" name="detail" class="form-control p-2"></div>
			<div><label>Address:</label><input type="text" name="address" class="form-control p-2"></div>
			<div><label>Email:</label><input type="text" name="email" class="form-control p-2"></div>
			<div><label>websit:</label><input type="text" name="websit" class="form-control p-2"></div>
		<div>
			<button class="btn-success btn btn-g p-3 m-3" name="send">submit</button>
		</div>
		</form>
	</form>
	</div>
</section>
</body>
</html>