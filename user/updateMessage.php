<!DOCTYPE html>
<?php include 'db.php';
$id= (int)$_GET['id'];
$sql = "select * from chatbot where id='$id'";
$rows = $db->query($sql);
$row= $rows->fetch_assoc();
if(isset($_POST['send'])){
$message = htmlspecialchars($_POST['message']);
$sql2 ="update chatbot set message='$messages' where id ='$id'";
$db->query($sql2);
$response = htmlspecialchars($_POST['response']);
$sql3 ="update chatbot set response='$response' where id ='$id'";
$db->query($sql3);
header('location: mainbot.php');
}
?>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<title>pomoboro Chatbot</title>
	</head>
	<body>
		<div class="container">
			<div  >
				<h1 class="text-center" style="margin-top: 70px">Update messages</h1>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<table class="table">
					<hr> <br>
					
					
					
					<form method="post" >
						<div class="form-group">
							<label>Message</label>
							<input type="text" required name="message" value = "<?php echo $row['messages'];?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Response</label>
							<input type="text" required name="response" value = "<?php echo $row['response'];?>" class="form-control">
						</div>
						<input type="submit" name="send" value="Update message " class="btn btn-success">
					</form>
					
				</div>
			</div>
		</body>
		<!-- <script>
			$(document).ready(function(){
			var date_input=$('input[name="task_date"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			var options={
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
			};
			date_input.datepicker(options);
			})
		</script> -->
	</html>