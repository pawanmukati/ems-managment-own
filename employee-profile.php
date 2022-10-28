<?php
require('top.inc.php');

$eid=$_SESSION['USER_EMAIL'];

$sql="SELECT * FROM employee,role_type WHERE role_type.email=employee.email AND role_type.email='$eid'";

$res=mysqli_query($con,$sql);
// echo $res;
// var_dump($res) ;

// if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
// 	$id=mysqli_real_escape_string($con,$_GET['id']);
// 	mysqli_query($con,"delete from `leave` where id='$id'");
// }

?>

<div class="main">
    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <tbody>
                    <?php
                    // $row = mysqli_fetch_assoc($res);
                    // var_dump($row) ;
                    while ($row = mysqli_fetch_assoc($res)) {
                   ;
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