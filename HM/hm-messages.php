<?php include('hm-header.php') ?>
<div class ="container contact-container">

    <h2 style="text-align: center;"> Messages</h2>
   <br>
   <?php
    $username = $_SESSION['username'];
    $hostel_man_id = $_SESSION['hm_id'];
    $query = "SELECT * FROM messages WHERE hm_id ='$hostel_man_id'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==0){
      echo '<br><br><br><h4 style="text-align:center;">No Messages<h4>';
   }
    
    while ($row = mysqli_fetch_assoc($result)){ ;
          ?> 

    <div class="container">
      <div class="card">
      <div class="card-header"><b><?php echo $row['subject']; ?></b></div>
      <div class="card-body"><?php echo " $row[message] <a href='hm-messages.php?hm_id=".$hostel_man_id ." & msg_id=".$row['msg_id']." ' class='btn-lg btn-primary' style='margin-top:10px;float: right;'>delete</a> ";?> <span style="float: right"> </div> 

      <div class="card-footer"><?php echo $row['student_id'] ?><span style="float: right"><?php echo $row['time_stamp'] ;?></span></div>
  </div>
</div>
<br><br>
             
    <?php
    } 
?>
</div>
</div>
<?php 
if(isset($_GET['hm_id'])){
  $hostel_man_id = $_GET['hm_id'];
  
  $query = "DELETE FROM messages WHERE hm_id ='$hostel_man_id' ";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script type='text/javascript'>alert('Successfully Deleted.')</script>";	
  }
  else{
    echo "<script type='text/javascript'>alert('Unable to Deleted.')</script>";
  }
}
?>
  <br><br><br><br><br><br>
<?php include('hm-footer.php');?>

