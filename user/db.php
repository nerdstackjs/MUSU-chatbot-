<?php 
  $db = new Mysqli;
  $db->connect('localhost', 'root', '', 'todobot');

  if(!$db){
  	echo "success";
  }




 ?>