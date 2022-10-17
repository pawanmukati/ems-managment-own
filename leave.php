<?php
require('top.inc.php');

// if($_SESSION['ROLE']!=2){
// 	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
// 	die();
// }


if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `leave` where id='$id'");
}
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `leave` set leave_status='$status' where id='$id'");
}

if( $_SESSION['ROLE']== "admin"){
   $sql="SELECT * FROM `leave` INNER JOIN employee on leave.leave_id = employee.name;";
}else{

}
$res=mysqli_query($con,$sql);


var_dump($res);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Leave</h4>
                           <?php if($_SESSION['ROLE']=="employee"){ ?>
                           <h4 class="box_title_link"><a href="add_leave.php">Add Leave</a> </h4>
                           <?php } ?>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="10%">Name</th>
                                       <th width="15%">From</th>
                                       <th width="15%">To</th>
                                       <th width="20%">Description</th>
                                       <th width="15%">Status</th>
                                       <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $row=mysqli_fetch_assoc($res);
                                    var_dump($row) ;

                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                    <tr>
                                                <td><?php echo $i?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['leave_from']?></td>
                                       <td><?php echo $row['leave_to']?></td>
                                       <td><?php echo $row['leave_description']?></td>
                                       <td>
                                          <?php
                                          if($row['leave_status']==1){
                                             echo "Applied";
                                          }if($row['leave_status']==2){
                                             echo "Approved";
                                          }if($row['leave_status']==3){
                                             echo "Rejected";
                                          }
                                          ?>
                                          <?php if($_SESSION['ROLE']=="admin"){ ?>
                                          <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
                                          <option value="">Update Status</option>
                                          <option value="2">Approved</option>
                                          <option value="3">Rejected</option>
                                          </select>
                                          <?php } ?>
                                          <script>
                                             function update_leave_status(id,select_value){
                                                window.location.href='leave.php?id='+id+'&type=update&status='+select_value;
                                             }
                                          </script>
                                       </td>
                                       <td>
                                                <?php
                                       if($row['leave_status']==1){ ?>
                                       <a href="leave.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
                                       <?php } ?>
                                                
                                                
                                          </td>
                                                
                                          </tr>
                                          <?php 
                                          $i++;
                                          } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
// require('footer.inc.php');
?>