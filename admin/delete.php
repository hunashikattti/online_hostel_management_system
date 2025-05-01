<?php 

include "config.inc.php";


if (isset($_POST["remove"])) {

    $hm_id = $_POST["hm_id"];

    $sql = "DELETE FROM hostel_managers WHERE hm_id=$hm_id";

    $result = mysqli_query($conn, $sql);
    

}
header("loacation:remove.php");
exit;


?>