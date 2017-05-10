<?php
include 'dbconfig.php';
$course = $_POST['course'];
$sql = "SELECT college_id,college_name,slug,tier from `college_list` where ". $course. "= 1 ";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row = mysqli_fetch_array($result))
{
	echo '<option value="'.$row['college_name'].'">'.$row['college_name'].'</option>';
}