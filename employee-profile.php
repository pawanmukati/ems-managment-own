<?php
require('top.inc.php');

$id = $_SESSION['USER_ID'];
// $id = $_GET["id"];
// $res = mysqli_query ($con, "SELECT id FROM employee WHERE id='$id'");
// $result = mysqli_fetch_assoc($res);
$res = mysqli_query($con, "SELECT * FROM employee");

// echo($res);

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
     ?>

                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?php echo $row['name']?></td>
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