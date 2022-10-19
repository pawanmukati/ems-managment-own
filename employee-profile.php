<?php
require('top.inc.php');

$eid=$_SESSION['USER_ID'];

// $sql = "select `employee`.* ,role_type.id as eid from `employee`,role_type 
// where `employee`.emp_id='$eid' and `employee`.emp_id=role_type.id";
$sql = "select * from employee JOIN role_type  on employee.emp_id = role_type.id";
// $sql = "SELECT id,'role_type' as tab from role_type
// UNION SELECT id, 'employee' as tab from employee";

// echo($res);
$res=mysqli_query($con,$sql);

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `leave` where id='$id'");
}

?>

<div class="main">
    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo($row) ;
                        ?>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo $row['username']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $row['email']?></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>:</td>
                        <td><?php echo $row['mobile']?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?php echo $row['address']?></td>
                    </tr>
                    <tr>
                        <td>DOB</td>
                        <td>:</td>
                        <td><?php echo $row['birthday']?></td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    </body>

    </html>