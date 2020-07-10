<?php
$con =mysqli_connect("localhost","root","","plant_doctor");
$limit_per_page = 3;
$page = "";
if(isset($_POST["page_no"])){
$page = $_POST["page_no"];
}else{
$page = 1;
}
$offset= ($page-1)*$limit_per_page;
$sql= "SELECT * FROM student LIMIT {$offset},{$limit_per_page}";
$result = mysqli_query($con,$sql) or die("query unsuccessfull.");
$output="";
if(mysqli_num_rows($result) > 0){
$output .= '<table class="table  table-bordered text-center p-2">
		<tr class="badge-dark">
		<th scope="col">#</th>
		<th scope="col">First</th>
		<th scope="col">Last</th>
	</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		
	$output .= "<tbody><tr><th scope='row'>{$row["id"]}</th><td>{$row["firstname"]}</td><td>{$row["lastname"]}</td></tr></tbody>";
	}
$output .="</table>";

$sql_total= "SELECT * FROM student";

$records= mysqli_query($con,$sql_total);

$total_record = mysqli_num_rows($records);

$total_pages= ceil($total_record/$limit_per_page);

$output .='<ul class="pagination pagination-lg justify-content-center">';
		for ($i=1; $i <= $total_pages; $i++) {
if($i==$page){
	$class_name= "active";
}else{
	$class_name="";
}
			$output .= "<li ><a class='{$class_name}' id='{$i}' href=''>{$i}</a></li>";
		}
	$output .='</ul>';

echo $output;
}
else
{
	echo "no record found";
}	

?>  