<?php include 'db.php';


$sql= "select * from chatbot  ";
$total = $db ->query("select * from chatbot")->num_rows;

$rows = $db->query($sql);
?>

<div id="updateModal" class="modal fade text-center">
                    <div class="modal-dialog modal-sm"">
                      <div class="modal-content">
                      </div>
                    </div>
                  </div>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">X</button>
    <h1>Time management tasks lab 2</h1>
</div>
<div class="modal-body">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            What you can do
        </div>
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <hr> <br>
                    
                    <!-- Modal -->
                    
                    <thead>
                        <tr>
                            <th scope="col">ID.</th>
                            <th scope="col">Task</th>
                            <th scope="col">Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php while($row = $rows->fetch_assoc()): ?>
                            
                            
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td class="col-md-10"><?php echo $row['messages'] ?></td>
                            <td class="col-md-10"><?php echo $row['response'] ?></td>
                            <td><a href="updateMessage.php?id=<?php echo $row['id'];?>"  class="btn btn-success"></a>Edit</td>
                            <td><a href="deleteMessage.php?id=<?php echo $row['id'];?>" class="btn btn-danger"></a>Delete</td>
                            
                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
                <center>
               
                </center>
                <center>

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