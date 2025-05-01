<?php include('admin-header.php') ?>

<div class ="container contact-container">

    <h2 style="text-align: center;">Enter the details</h2>
    <br>
    <form action="remove.php" method="post">
        <div class="row">

            <div class="col-md-8" style="padding-left:400px ;">
            <input type="text" name='username' class="form-control student-text" placeholder="User Name">
            <select class="custom-select" name="hostel_name">
                    <option selected>Hostel Name</option>
                    <option value="A">A Hostel</option>
                    <option value="B">B Hostel</option>
                    <option value="C">C Hostel</option>
                    <option value="D">D Hostel</option>
                    <option value="E">E Hostel</option>
                    <option value="F">F Hostel</option>
            </select>
             <input type="password" name='password' class="form-control student-text" placeholder="Admin Password">
            </div>
            <div class="col-md-10" style="padding-left: 540px;">
            <button type="submit" name="remove-hm"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

<br><br><br><br>

    <table class="table table-bordered">
    <thead>
      <tr>
      <th>Manager Name</th>
        <th>Hostel ID</th>
        <th>Contact Number</th> 
        <th>Hostel</th>
        <th>User Name </th>
        <th>Action </th>
      </tr>
    </thead>
    <tbody>
    <?php
       echo "<p style='color:red; fount:arial; font-size:20px;'>Hostel Managers ";
        $query = "SELECT * FROM hostel_manager ORDER BY hostel_id ";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 0) {
            echo '<tr><td colspan="4">No Manager Foun</td></tr>';
    } else {
      
      while ($row6 = mysqli_fetch_assoc($result)) {
        $name = $row6['f_name'] . " " . $row6['l_name'];
        $query7 = "SELECT * FROM hostel WHERE hostel_id = '$row6[hostel_id]'";
        $result7 = mysqli_query($conn, $query7);
        $row7 = mysqli_fetch_assoc($result7);
        $hostel_name = $row7['hostel_name'];
       // <button type="submit" name="remove-hm"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
       //<input type='submit' name='submit' value='Submit'>
       ?>
      <form action="remove.php" method="post">
        <?php echo "<tr><td>{$name}</td><td>{$row6['hostel_id']}</td><td>{$row6['mobile']}</td><td>{$hostel_name}</td><td>{$row6['username']}</td><td> <a href='remove.php?hm_id=".$row6['hm_id']."' class='btn-lg btn-primary' style='margin-top:10px;'>Remove</a>           </td> </tr><br> ";
     ?> </form> <?php
      }
    }
    ?>
    
    </tbody>
    </table>

</div>
<br>
<br>
<?php include('admin-footer.php'); ?>

<?php

if (isset($_POST['remove-hm'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $hostel_name = $_POST['hostel_name'];
//  echo $username;
//  echo $password;
//  echo $hostel_name;

  if (empty($username) || empty($password) || empty($hostel_name) ) {
    echo "<script type='text/javascript'>alert('Empty Feild!')</script>";
    exit();
  }
  else if($_SESSION['password']!=$password){
    echo "<script type='text/javascript'>alert('Wrong Password!')</script>";
    exit();
  }
  else {
    $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row==0)
    {
      echo "<script type='text/javascript'>alert('Enter the hostel and user name!')</script>";

    } else {


      $hostel_id = $row['hostel_id'];
      $sql = "DELETE FROM hostel_manager WHERE username='$username' and hostel_id='$hostel_id'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<script type='text/javascript'>alert('Sucessfully Deleted!')</script>";
        exit();
      } else {
        echo "<script type='text/javascript'>alert('Deletion Failed!')</script>";
        exit();
      }
    }
  }
}


?>
<?php

if (isset($_GET['hm_id'])) {
  $id= $_GET['hm_id'];
  

  $sql = "DELETE FROM `hostel_manager` WHERE `hm_id`='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script type='text/javascript'>alert('Sucessfully Deleted!')</script>";
    exit();
  } else {
    echo "<script type='text/javascript'>alert('Deletion Failed!')</script>";
    exit();
  }

}

?>