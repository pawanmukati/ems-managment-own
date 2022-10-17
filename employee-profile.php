<?php
require('top.inc.php');


$res = mysqli_query($con, "select * from employee");

// var_dump($res)
?>

<div class="main">

    <div class="card">
        <div class="card-body">
            <i class="fa fa-pen fa-xs edit"></i>
            <table>
                <tbody>
                    <?php
while ($row = mysqli_fetch_assoc($res)) { ?>

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