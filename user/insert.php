<?php 
 include 'db.php'; 

 if(isset($_POST['send'])){

 	$name =htmlspecialchars($_POST['task']);
 	$task_date = htmlspecialchars($_POST['task_date']);

 	$sql ="INSERT INTO tasks(name, task_date) VALUES ('$name', '$task_date')";

 	$val = $db->query($sql);

 	if($val){
 		header('location: mainbot.php');
 	}
 }

?>

