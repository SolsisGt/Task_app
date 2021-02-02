<?php
include('database.php');
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $date_end = $_POST['date_end'];
    $time_end = $_POST['time_end'];
    $description = $_POST['description'];
    $course = $_POST['course'];
    $query="INSERT INTO task(name,course,task_end,end_time,description) VALUES('$name','$course','$date_end','$time_end','$description')";
    $result =mysqli_query($connection,$query);
    if(!$result){
        die('query failed');
    }
    echo'Task Added Success';
}

?>