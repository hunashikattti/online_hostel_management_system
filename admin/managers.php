<?php include('admin-header.php') ?>

<div class ="container contact-container">


<table class="table table-bordered">

    <thead>
    
      <tr>
      <th>Manager Name</th>
        <th>Hostel ID</th>
        <th>Contact Number</th> 
        <th>Hostel</th>
        <th>User Name </th>
       
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
      
        <?php echo "<tr><td>{$name}</td><td>{$row6['hostel_id']}</td><td>{$row6['mobile']}</td><td>{$hostel_name}</td><td>{$row6['username']}</td> </tr><br> ";
      
      }
    }
    ?>
    
    </tbody>
    </table>


  
</div>
<?php include('admin-footer.php'); ?>
