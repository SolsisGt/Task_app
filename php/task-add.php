<?php
include('database.php');
if(isset($_POST['name'])){
    $name=$_POST['name'];
        $date_start=$_POST['date_start'];
        $date_end=$_POST['date_end'];
        $time_start=$_POST['time_start'];
        $time_end=$_POST['time_end'];
    $description=$_POST['description'];
    $query="INSERT INTO task(name, task_start,task_end,star_time,end_time,description) VALUES('$name','$date_start','$date_end','$time_start','$time_end','$description')";
    $result =mysqli_query($connection,$query);
    if(!$result){
        die('query failed');
    }
    echo'Task Added Success';
}

?>