<?php
    include('database.php');
    $query="SELECT * from task";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die('Query Falied'.mysqli_error($connection));
    }
    $json=array();
    while($row=mysqli_fetch_array($result)){
        $json[]=array(
            'name'=>$row['name'],
            'course'=>$row['course'],
            'description'=>$row['description'],
            'Task_end'=>$row['task_end'],
            'end_time'=>$row['end_time'],
            'id'=>$row['id']
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
?>
