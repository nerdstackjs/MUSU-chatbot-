<?php include 'db.php';
$page = (isset($_GET['page']) ? (int)$_GET['page']: 1);
$perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5);
$start  = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql= "select * from tasks limit  ".$start.", ".$perPage." ";
$total = $db ->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);
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
            What you need to do 
        </div>
        <div class="panel-body">
           
            <div class="col-md-10 col-md-offset-1">
              <table id="myTable" class="table table-hover">
                 
                <!--  search bar  -->

                <div id="search-bar">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search powered by Musu... ">
                  <button><i class="fa fa-microphone" id="search-addon"></i></i></button>
                </div>
                <br/>
                   
                    
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
                            <td class="col-md-10"><?php echo $row['name'] ?></td>
                            <td class="col-md-10"><?php echo $row['task_date'] ?></td>
                            <td><a href="update.php?id=<?php echo $row['id'];?>"  class="btn btn-success"></a>Edit</td>
                            <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger"></a>Delete</td>
                            
                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
                <center>
                <ul class="pagination">
                    <?php for($i = 1;$i <= $pages; $i++):  ?>
                    <li ><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
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

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>