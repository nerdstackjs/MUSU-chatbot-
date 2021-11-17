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
header('location: index.php');
}
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">X</button>
    <h1>Time management web app lab 2</h1>
</div>
<div class="modal-body">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
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

              
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal-footer">
        <div class="panel-footer">
            <input type="button" value="Find Employee" id="empbutton" />
            <div class="col-xs-10" id="lblstatus"></div>
        </div>
    </div> -->
</div>

