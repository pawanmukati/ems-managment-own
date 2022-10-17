<?php
    require('top.inc.php');
    // if($_SESSION['ROLE']!="1"){
    //     header('location:add_employee.php?id='.$_SESSION['USER_ID']);
    //     die();
    // }
    $name='';
    $email='';
    $mobile='';
    $address='';
    $birthday='';
    // $password='';
    $id='';
    
    if(isset($_GET['id'])){
        $id=mysqli_real_escape_string($con,$_GET['id']);
        if($_SESSION['ROLE']=="employee" && $_SESSION['USER_ID']!=$id){
            die("Access Denied");
        }
        $res=mysqli_query($con,"select * from employee where id='$id'");
        $row=mysqli_fetch_assoc($res);
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        $birthday = $row['birthday'];
    }
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $birthday = mysqli_real_escape_string($con,$_POST['birthday']);
        if($id>0){
            $sql="update employee set name='$name' , email='$email' ,password='$password',
            mobile='$mobile',address='$address',birthday='$birthday' where id='$id'";
        }else{
            $sql="insert into employee(name,email,password,mobile,address,birthday,role) 
            values('$name','$email','$password','$mobile','$address','$birthday','2')";

            $sql="insert into role_type(email,password,user_type,username) 
            values('$name','$email','$password','$mobile','$address','$birthday','2')";
        }
        mysqli_query($con,$sql);
        header('location:employee.php');
        die();
    } 
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
                                    <label class=" form-control-label">Name</label>
                                    <input type="text" value="<?php echo $name?>" name="name" placeholder="Enter employee name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email</label>
                                    <input type="text" value="<?php echo $email?>" name="email" placeholder="Enter employee email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Phone Number</label>
                                    <input type="text" value="<?php echo $mobile?>" name="mobile" placeholder="Enter employee phone number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Password</label>
                                    <input type="password"  name="password" placeholder="Enter employee password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Address</label>
                                    <input type="text" value="<?php echo $address?>" name="address" placeholder="Enter employee address" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">DOB</label>
                                    <input type="date" value="<?php echo $birthday?>" name="birthday" placeholder="Enter employee DOB" class="form-control" required>
                                </div>
							   <?php if ($_SESSION['ROLE']=="admin" || $_SESSION['ROLE']=="subadmin"){?>
                                    <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                    </button>
                               <?php }?>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
// require('footer.inc.php');
?>