<?php include('admin-header.php') ?>

  
<div class ="container contact-container">

<h2 style="text-align: center;">Enter the details</h2>
<br>
<form action="edit.php" method="POST">
    <div class="row">

        <div class="col-md-8" style="padding-left:400px ;">
        <input type="text" disabled="disabled" name='hm_id' class="form-control student-text" value="<?php echo $_GET['hm_id'] ?>">
        <input type="text" name="username" class="form-control student-text" value="<?php echo $_GET['u_name'] ?>" >
            <input type="text" name="f_name" class="form-control student-text" value="<?php echo $_GET['f_name'] ?>" >
            <input type="text" name="l_name" class="form-control student-text" value="<?php echo $_GET['l_name'] ?>" >
            <input type="password" name="password" class="form-control student-text" value="<?php echo $_GET['psswd'] ?>" >
            
            <input type="text" name="mobile" class="form-control student-text" value="<?php echo $_GET['mobile'] ?>" >
        </div>
        <div class="col-md-10" style="padding-left: 540px;">
        <button type="submit" name="edit-hm"  class="btn-lg btn-primary" style="margin-top:10px;">Edit</button>
        </div>
    </div>
</form>

</div>
<?php

//include('config.inc.php');
if (isset( $_POST['edit-hm'])) {
  $hm_id = $_POST['hm_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  //$hostel_name = $_GET['hostel_name'];
  $mobile = $_POST['mobile'];
  $ha_id = $_SESSION['ha_id'];
    



        if (empty($username) || empty($password) || empty($f_name) || empty($l_name)  || empty($mobile)) {
            echo "<script type='text/javascript'>alert('Empty Feild!')</script>";
            exit();
        } else {
            $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $hostel_id = $row['hostel_id'];
            //echo $hostel_id;
            //echo $row;
            $sql1 = "UPDATE `hostel_manager` SET `f_name`='[$f_name]',`l_name`='[l_name]',`username`='[$username]',`mobile`='[$mobile]',`password`='[$password]' WHERE `hm_id`='[$hm_id]' ";
            $result = mysqli_query($conn, $sql1);
           
            if ($result) {
                echo "<script type='text/javascript'>alert('Hostel Manager insertion Success!')</script>";
                exit();
            } else {
                echo "<script type='text/javascript'>alert('Hostel Manager insertion Failed!')</script>";
                exit();
            }
        }
   
}

?>




  <?php 
 include('admin-footer.php'); ?>

