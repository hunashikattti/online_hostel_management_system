<?php
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    include '../hm-backend/db-connect.php';
    $sql = "DELETE FROM messages WHERE student_id=$id";
    $result_search = mysqli_query($conn,$sql);
   
   

}
header("location:hm-messages.php");
exit;
?>