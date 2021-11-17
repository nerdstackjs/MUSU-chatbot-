<!DOCTYPE html>
<?php include 'db.php';
$id= (int)$_GET['id'];
$sql = "select * from tasks where id='$id'";
$rows = $db->query($sql);
$row= $rows->fetch_assoc();
if(isset($_POST['send'])){
$task = htmlspecialchars($_POST['task']);
$sql2 ="update tasks set name='$task' where id ='$id'";
$db->query($sql2);
$task_date = htmlspecialchars($_POST['task_date']);
$sql3 ="update tasks set task_date='$task_date' where id ='$id'";
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
		<title>Crud App</title>
	</head>
	<body>
		<div class="container">
			<div  >
				<h1 class="text-center" style="margin-top: 70px">Update Todo List</h1>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<table class="table">
					<hr> <br>
					
					
					
					<form method="post" >
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" required name="task" value = "<?php echo $row['name'];?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="text" required name="task_date" name="task_date" value="<?php echo $row['task_date'];?>" type="text" class="form-control">
						</div>
						<input type="submit" name="send" value="Update Task" class="btn btn-success">
					</form>
					
				</div>
			</div>
		</body>
		<script>
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
		</script>
	</html>