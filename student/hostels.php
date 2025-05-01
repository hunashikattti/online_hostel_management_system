<?php include('student-header.php') ?>
<?php
$student_id = $_SESSION['roll'];
$query = "SELECT * FROM student WHERE student_id = '$student_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$year = $row['year'];
?>

<div class="container">
    <div class="card-deck cards-format ">
      <?php if($year==1){?>
      <div class="card border-secondary">
        <img class="card-img-top"  src="assets/images/a-hostel.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">A Hostel</h5>
          <p class="card-text">For 1st year students</p>
          <a href="application-form.php?id=A" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
      <?php if ($year==2){?>
      <div class="card border-secondary">
        <img class="card-img-top card-image" src="assets/images/b-hostel.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">B Hostel</h5>
          <p class="card-text">For 2nd year students</p>
          <a href="application-form.php?id=B" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
      <?php if ($year==3){?>
      <div class="card border-secondary">
        <img class="card-img-top card-image" src="assets/images/c-hostel.jpg" alt="Card image cap" >
        <div class="card-body">
          <h5 class="card-title">C Hostel</h5>
          <p class="card-text">For 3rd year students</p>
          <a href="application-form.php?id=C" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
    </div>

    
</div>

<div class="container second-card">
    <div class="card-deck cards-format">
    <?php if ($year==3){?>
      <div class="card border-secondary">
        <img class="card-img-top" src="assets/images/d-hostel.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">D Hostel</h5>
          <p class="card-text">For 3rd year students</p>
          <a href="application-form.php?id=D" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
      <?php if ($year==4){?>
      <div class="card border-secondary">
        <img class="card-img-top" src="assets/images/e-hostel.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">E Hostel</h5>
          <p class="card-text">For 4th year students</p>
          <a href="application-form.php?id=E" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
      <?php if ($year==4){?>
      <div class="card border-secondary">
        <img class="card-img-top" src="assets/images/f-hostel.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">F Hostel</h5>
          <p class="card-text">For 4th year students</p>
          <a href="application-form.php?id=F" class="btn btn-primary">Apply</a>
        </div>
      </div>
      <?php } ?>
    </div>

    
</div>
<br><br><br><br>
<?php include('student-footer.php');