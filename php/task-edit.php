<?php
include('database.php');
$id=$_POST['id'];
$name=$_POST['name'];
$date_end=$_POST['date_end'];
$time_end=$_POST['time_end'];
$description=$_POST['description'];
$course=$_POST['course'];
    
    $query="UPDATE task SET name='$name' , course = '$course', description = '$description', task_start = '$date_start', task_end = '$date_end',star_time = '$time_start',end_time = '$time_end' WHERE id='$id'";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die('Query Falied');
    }
    echo"Update task successfuly";

?>