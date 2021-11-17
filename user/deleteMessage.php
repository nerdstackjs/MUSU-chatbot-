<?php
  include 'db.php'; 

  $id = (int)$_GET['id'];

  $sql = "delete from chatbot where id = '$id'";

  $val = $db->query($sql);

  if($val){
	
  	header('location: mainbot.php ');
  };

 ?>