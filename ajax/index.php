<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="ajax_pagination.php">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="java-script" type="text/java-script" href="../js/jquery-1.10.2.min.js">
</head>
<body>
<div class="container">
	<header>
		<h2 class="text-center display-4 text-danger">this is ajax table</h2>
	</header>

	<section class="pt-3">
    <div id="table-data">
    	

    </div>
</section>
</div> 
<script language="JavaScript" type="text/javascript">

	$(document).ready(function () {
		function loadTable(page){
			$.ajax({
				url: "ajax_pagination.php",
				type: "POST",
				data: {page_no : page },
				success: function(data) {
					$("#table-data").html(data);
				}
			});
		}
		loadTable();

		//pagination code

		$(document).on("click","li a",function(e){
			e.preventDefault();
			var page_id = $(this).attr("id");
			loadTable(page_id);
		});
	});	
	

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

